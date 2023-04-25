<?php
require_once 'modules/admin/models/ServicePlugin.php';
require_once 'modules/admin/models/Package.php';
require_once 'modules/clients/models/DomainNameGateway.php';
require_once 'modules/billing/models/BillingCycle.php';
require_once 'plugins/registrars/netim/api/APISoap.php';
require_once 'plugins/registrars/netim/lib/Core.php';
require_once 'plugins/registrars/netim/lib/Database.php';

use Netim\NetimAPIException;
use Netim\Core;
use Netim\Database;
use Netim\APISoap;

/**
* @package Plugins
*/
class PluginNetimopesync extends ServicePlugin
{
    protected $featureSet = 'products';
    public $hasPendingItems = false;

    /**
     * All plugin variables/settings to be used for this particular service.
     *
     * @return array The plugin variables.
     */
    function getVariables()
    {
        $variables = array(
            lang('Plugin Name')   => array(
                'type'          => 'hidden',
                'description'   => '',
                'value'         => lang('Netim asynchronous management'),
            ),
            lang('Enabled')       => array(
                'type'          => 'yesno',
                'description'   => lang('This task performs the follow up of asynchronous requests currently pending at NETIM level. Domain names are then activated or updated when their processing is done.'),
                'value'         => '1',
            ),
            lang('Run schedule - Minute')  => array(
                'type'          => 'text',
                'description'   => lang('Enter number, range, list or steps'),
                'value'         => '15'
            ),
            lang('Run schedule - Hour')  => array(
                'type'          => 'text',
                'description'   => lang('Enter number, range, list or steps'),
                'value'         => '*',
            ),
            lang('Run schedule - Day')  => array(
                'type'          => 'text',
                'description'   => lang('Enter number, range, list or steps'),
                'value'         => '*',
            ),
            lang('Run schedule - Month')  => array(
                'type'          => 'text',
                'description'   => lang('Enter number, range, list or steps'),
                'value'         => '*',
            ),
            lang('Run schedule - Day of the week')  => array(
                'type'          => 'text',
                'description'   => lang('Enter number in range 0-6 (0 is Sunday) or a 3 letter shortcut (e.g. sun)'),
                'value'         => '*',
            ),
            lang('Enforce renewal after transfer') => array(
                'type'          =>'yesno',
                'description'   =>lang('Define how the duration is managed after a successfull transfer. See documentation'),
                'value'         => '1'
            ),
            lang('Sync Due Date?') => array(
                'type'        => 'yesno',
                'description' => lang('When enabled, a domain will have its next due date updated to the expiration date after any paid operation.'),
                'value'       => '1',
            )
        );

        return $variables;
    }

    /**
     * Handle all asynchronous requests in netim_async table
     *
     * @return void
     */
    function execute()
    {   
        //Get all asynchronous requests in netim_async table
        $requests = Netim\Database\getAllAsyncRequests($this->db);

        while($row = $requests->fetch())
        {
            //mail('bruno@netim.com','row',print_r($row,true));
            $domain = $row['DOMAINE'];
            $id_ope = $row['ID_OPE'];

            $this->Log($domain, "Processing request #".$id_ope. " (".$row['CODE_OPE'].")");

            //Get the service id from database
            $id_package = Netim\Core\GetDomainID($this->db, $domain);
            if(!$id_package)
            {
                 //Remove the domain from async requests
                Netim\Database\removeAsyncRequest($this->db, $id_ope);

                $this->Log($domain, "No Package for asynchronous request $id_ope, removed from pending requests",1);
                continue;  
            }

            //Load the service object
            $package = new UserPackage($id_package);
            if(!$package)
            {
                $this->Log($domain, "Error loading user package $id_package",1);
                continue;  
            }
            $customerId = $package->getCustomerId();

            //Get API
            $loginArray = array("Login" => $this->settings->get('plugin_netim_Login'), "Password" => $this->settings->get('plugin_netim_Password'), "Use testing plateform" => ($this->settings->get('plugin_netim_Use testing plateform')==1));
            $api = Netim\Core\getApi($loginArray);

            //Query request info
            try
            {  
                $ope = $api->queryOpe($id_ope);
                $this->Log($domain, "Result = ".$ope->STATUS);
            }
            catch (NetimAPIException $exception)
            {
                $this->Log($domain, "API Error (queryOpe) for $id_ope : ".$exception->getMessage(),1);
                //$api->disconnect();
                continue;
            }

            if($ope->STATUS=="Done")
            {
                //Query domain info
                try
                {  
                    $domainInfo = $api->domainInfo($domain);
                }
                catch (NetimAPIException $exception)
                {
                    $this->Log($domain, "API Error (domainInfo): ".$exception->getMessage(),1);
                    //$api->disconnect();
                    continue;
                }

                //Process successful request      
                switch($row['CODE_OPE'])
                {
                    case "domainTransferTrade":        
                    case "domainTransferIn":
                        // Rules for duration management
                        // if "Enforce renewal after transfer" is enabled
                        // AND
                        // if cost pricing >0 (we consider that one year renewal is included in the transfer cost pricing)
                        // then we renew the domain for the duration ordered minus 1 year.

                        if($this->settings->get('plugin_netimopesync_Enforce renewal after transfer')==1)
                        {
                            $this->Log($domain, "Enforce renewal after transfer");

                            // Get the duration ordered
                            $dng = new DomainNameGateway();
                            $period = $dng->getPeriod($package);
                            $billingCycle = new BillingCycle($period);
                            $numYears = 1;
                    
                            if ($billingCycle->time_unit == 'y')
                                $numYears = $billingCycle->amount_of_units;

                            $this->Log($domain, "Number of years ordered = $numYears");
            
                            // Is an additional renew needed ?
                            try
                            {    
                                $prices = $api->queryDomainPrice($domain);
                                $cost = $prices->Fee4Transfer;      
                            }
                            catch (NetimAPIException $exception)
                            {
                                $this->Log($domain, "API Error (queryDomainPrice): ".$exception->getMessage(),1);
                                $api->disconnect();
                                break;
                            }

                            $this->Log($domain, "Cost pricing = $cost");

                            if($cost>0)
                                $additional_duration = $numYears-1;
                            else if($cost==0)
                                $additional_duration = $numYears;
                            
                            $this->Log($domain, "Additional renewal = $additional_duration");

                            if($additional_duration>0)
                            {  
                                // Call API domainRenew
                                try
                                {    
                                    $result  = $api->domainRenew($domain, $additional_duration);
                                    
                                    if($result->STATUS=="Pending" || $result->STATUS=="Done")
                                    {
                                        $this->Log($domain, "New domainRenew request #".$result->ID_OPE);

                                        // We manage both cases asynchronously to update the expiration accordingly after the activation
                                        Netim\Database\addAsyncRequest($this->db, $result->ID_OPE, 'domainRenew', $domain);
                                    }
                        
                                    if($result->STATUS=="Failed")
                                        $this->Log($domain, "API Error (domainRenew): ".$ope->MESSAGE.". Ensure to synchronize the domain expiration according to the term ordered by the client",1);
                                }
                                catch (NetimAPIException $exception)
                                {
                                    $this->Log($domain, "API Error (domainRenew): ".$exception->getMessage().". Ensure to synchronize the domain expiration according to the term ordered by the client",1);
                                } 
                            }  
                        }

                        //Change the registration option to 'Host-Managed'
                        //When transfers are successfully done, we change the registation option so that domain names have the same behaviour than any other domains
                        $package->setCustomField('Registration Option', 0);

                        // No break here !!!!

                    case "domainRenew": 
                    case "domainCreate":    

                        $dataEvent=array();
                        $dataEvent["Domain"]=$domain;

                        //Change status to Active
                        //Even for expired domain name that come back to active status
                        $package->status = PACKAGE_STATUS_ACTIVE;
                        $package->save();

                        $this->Log($domain, "Domain successfully activated with expiration date ".$domainInfo->dateExpiration);

                        //Record the expiration date
                        $package->setCustomField('Expiration Date', strtotime($domainInfo->dateExpiration));
                        $dataEvent["Expiration Date"]=$domainInfo->dateExpiration;

                        //Update the Next Billing date according to plugin settings
                        if($this->settings->get('plugin_netimopesync_Sync Due Date?')==1)
                        {
                            $this->Log($domain, "Sync due date to ".$domainInfo->dateExpiration);

                            $recurringFee = $package->getRecurringFeeEntry();
                            $recurringFee->setNextBillDate($domainInfo->dateExpiration); //Doesn't work as it should !
                            if(Netim\Core\updateNextDueDate($this->db,$id_package,$domainInfo->dateExpiration))
                                $dataEvent["Next due Date"]=$domainInfo->dateExpiration;
                            else
                                $this->Log($domain, "Failed to sync due date to ".$domainInfo->dateExpiration);
                               
                        }

                        //Record events
                        $dataEvent["Following request"]=$row['CODE_OPE']. " #".$id_ope;                       
                        $packageLog = Package_EventLog::newInstance(false, $customerId, $id_package, PACKAGE_EVENTLOG_UPDATED, 0, serialize($dataEvent));
                        $packageLog->save();

                        $packageLog = Package_EventLog::newInstance(false, $customerId, $id_package, PACKAGE_EVENTLOG_CHANGEDSTATUS, 0, "ACTIVE");
                        $packageLog->save();

                        //Remove the domain from async requests
                        Netim\Database\removeAsyncRequest($this->db,$id_ope);

                        break; 

                    case "domainDelete":

                        $this->Log($domain, "Domain successfully deleted at the registry");

                        //Change status to Cancelled
                        $package->status = PACKAGE_STATUS_CANCELLED;
                        $package->save();
                        
                        //Record events
                        $packageLog = Package_EventLog::newInstance(false, $customerId, $id_package, PACKAGE_EVENTLOG_CHANGEDSTATUS, 0, "CANCELLED");
                        $packageLog->save();

                        //Remove the domain from async requests
                        Netim\Database\removeAsyncRequest($this->db,$id_ope);
                        break;
                        
                    case "domainSetDNSSec":

                        $this->Log($domain, "Domain DNSsec successfully changed");

                        //Remove the domain from async requests
                        Netim\Database\removeAsyncRequest($this->db, $id_ope);
                        break;

                    default:
                        //Remove the domain from async requests
                        Netim\Database\removeAsyncRequest($this->db, $id_ope);
                        break;
                }
            }
            else if($ope->STATUS=="Failed")
            { 
                $this->Log($domain, $row['CODE_OPE']. " request $id_ope failed : ".$ope->MESSAGE,1);
                          
                //Remove the domain from async requests
                Netim\Database\removeAsyncRequest($this->db,$row['ID_OPE']);     
            }
            else if($ope->STATUS=="Cancelled")
            { 
                $this->Log($domain, $row['CODE_OPE']. " request $id_ope is cancelled at the registrar");
            
                //Remove the domain from async requests
                Netim\Database\removeAsyncRequest($this->db,$row['ID_OPE']);     
            }
            else
                $this->Log($domain, "Waiting for completion");
          
            //Disconnect API    
            //$api->disconnect();
        } 
    }

    function Log($domain, $message, $loglevel=4)
    {
        $vars = $this->getVariables();
        $name=$vars['Plugin Name']['value'];
        //mail('baptiste.lefebvre@netim.com','cron',"[$name] $domain >>> $message");

        CE_Lib::log($loglevel, "[$name] $domain >>> $message");
    }

    function output() 
    {
    }

    function dashboard()
    {
    }
}
?>
