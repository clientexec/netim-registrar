<?php

    use Netim\APISoap;
    use Netim\Contact;
    use Netim\NetimAPIException;
    use Netim\NormalizedContact;
    use Netim\Database;
    use Netim\Core;

    require_once 'modules/admin/models/RegistrarPlugin.php';
    require_once 'modules/clients/models/DomainNameGateway.php';
    
    include_once 'plugins/registrars/netim/api/APISoap.php';
    include_once 'plugins/registrars/netim/api/Contact.php';
    require_once 'plugins/registrars/netim/lib/NormalizedContact.php';
    require_once 'plugins/registrars/netim/lib/Core.php';
    require_once 'plugins/registrars/netim/lib/Database.php';
    
    class PluginNetim extends RegistrarPlugin
    {
        public $features = [
            'nameSuggest' => false,
            'importDomains' => true,
            'importPrices' => true,
        ];

        public $dnstypes = ['A', 'AAAA', 'MX', 'CNAME', 'TXT','URL','FRAME'];

        function getVariables():array
        {
            
            $variables = array(
                lang('Plugin Name') => array (
                    'type'          =>'hidden',
                    'description'   =>lang('How CE sees this plugin (not to be confused with the Signup Name)'),
                    'value'         =>lang('NETIM')
                ),
                
                lang('Description')  => array(
                    'type'          => 'label',
                    'description'   => "NETIM is an ICANN-accredited domain name registrar, which provides domain name registration for more than 1000 worldwide extensions. This module allows to register and manage most of all ccTlds and gTlds with management of additional domain fields, trustee and local contact service.<br>
                     <a href='https://www.netim.com/reseller/' target='_blank'>Signup for a reseller account</a>",
                    'value'         => ''
                ),
                lang('Use testing plateform') => array(
                    'type'          =>'yesno',
                    'description'   =>lang("Select Yes if you wish to use NETIM testing environment.<BR><strong>Note:</strong> You will first need to <a href='https://oteweb.netim.com/direct/create-reseller-account' target='_blank'>signup for a reseller test account</a>"),
                    'value'         =>0
                ),
                lang('Login') => array(
                    'type'          =>'text',
                    'description'   =>lang('Enter the username of your NETIM reseller account.'),
                    'value'         =>''
                ),
                lang('Password') => array(
                    'type'          =>'password',
                    'description'   =>lang('Enter the password of your NETIM reseller account.'),
                    'value'         =>''
                ),
                lang('DNS 1') => array(
                    'type'          =>'text',
                    'description'   =>'Default nameserver #1',
                    'value'         =>''
                ),
                lang('DNS 2') => array(
                    'type'          =>'text',
                    'description'   =>'Default nameserver #2',
                    'value'         =>''
                ),
                lang('DNS 3') => array(
                    'type'          =>'text',
                    'description'   =>'Default nameserver #3',
                    'value'         =>''
                ),
                lang('DNS 4') => array(
                    'type'          =>'text',
                    'description'   =>'Default nameserver #4',
                    'value'         =>''
                ),
                lang('DNS 5') => array(
                    'type'          =>'text',
                    'description'   =>'Default nameserver #5',
                    'value'         =>''
                ),
                lang('Supported Features')  => array(
                    'type'          => 'label',
                    'description'   => '* '.lang('Domain Registration / Transfer / Renewal / Deletion').' <br>'.
                    '* '.lang('Get / Set Nameservers').' <br>'.
                    '* '.lang('Get / Set Contact Information').' <br>'.
                    '* '.lang('Get / Set Whois privacy').' <br>'.
                    '* '.lang('Get / Set Registrar lock').' <br>'.
                    '* '.lang('Support of DNSsec').' <br>'.
                    '* '.lang('Get / Set DNS Records').' <br>'.
                    '* '.lang('Support of asynchronous results').' <br>'.
                    '* '.lang('Support of additional domain data').' <br>'.
                    '* '.lang('Support of addons for trustee service / local contact service').' <br>',
                    'value'         => ''
                ),
                lang('Actions') => array (
                    'type'          => 'hidden',
                    'description'   => lang('Current actions that are active for this plugin (when a domain isn\'t registered)'),
                    'value'         => 'Register ('.lang('Initiate Registration').'),DomainTransferWithPopup ('.lang('Initiate Transfer').')'
                ),
                lang('Registered Actions') => array (
                    'type'          => 'hidden',
                    'description'   => lang('Current actions that are active for this plugin (when a domain is registered)'),
                    'value'         => 'SetPrivacyWhois ('.lang('Toggle Privacy whois').'),SetRegistrarLock('.lang('Toggle Registrar lock').'),SetDnsSec ('.lang('Toggle DNSsec').'),SendTransferKey ('.lang('Get Transfer Key').'),Delete ('.lang('Delete Domain').'),Renew ('.lang('Renew Domain').'),DomainTransferWithPopup ('.lang('Initiate Transfer').')'
                ),
                lang('Registered Actions For Customer') => array (
                    'type'          => 'hidden',
                    'description'   => lang('Current actions that are active for this plugin (when a domain is registered)'),
                    'value'         => 'SendTransferKey ('.lang('Get Transfer Key').'),SetPrivacyWhois ('.lang('Toggle Privacy whois').'),SetRegistrarLock('.lang('Toggle Registrar lock').'),SetDnsSec ('.lang('Toggle DNSsec').')',
                )
            );

            return $variables;
        }

        /**
         * Check if the domain name is available
         *
         * @param array $params Contains the values for the variables defined in getVariables() and tld and sld values (top-level domain and second-level domain)
         *
         * @return array <pre>array(code [,message]), where code is:
         *                       0:       Domain available
         *                       1:       Domain already registered
         *                       2:       Registrar Error, domain extension not recognized or supported
         *                       3:       Domain invalid
         *                       5:       Could not contact registry to lookup domain</pre>
         */
        function checkDomain($params):array
        {   
            include (dirname(__FILE__). '/config.inc.php');

            // Domain Details
            $tld = $params["tld"];
            $sld = $params["sld"];
            $domain = $sld.'.'.$tld;

            // For acceptance tests only, do not remove
            if(preg_match("#cexec-transfer#",$domain)) {
                $domains[] = ["tld" => $tld, "domain" => $sld, "status" => 1];
                return array("result" => $domains);
            }

            // Get API object 
            try {
                $api = Netim\Core\getAPI($params);
            } catch (NetimAPIException $exception) {
                throw new CE_Exception("API connect error",EXCEPTION_CODE_CONNECTION_ISSUE);
            }

            // Call API domainCheck
            try {
                $res = $api->domainCheck($domain);
            }
            catch (NetimAPIException $exception) {
                if(!preg_match("#E13-M1305#",$exception->GetMessage()) && $netim_check_debug)
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);   

                $domains[] = ["tld" => $tld, "domain" => $sld, "status" => 2];
                $this->_logNetim(__FUNCTION__, "", $domain, $domains);
                return array("result" => $domains);      
            }
            finally {
                if($netim_check_debug)
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            // Handle result
            if(empty($res[0]->reason))
            {
                switch ($res[0]->result) {
                    case "AVAILABLE": $status = 0; break;     
                    case "NOT AVAILABLE": $status = 1; break;
                    default: $status = 2; break;     
                }
            }
            else // No premium support, and so on
                $status = 1;

            // Build result
            $domains[] = ["tld" => $tld, "domain" => $sld, "status" => $status];
            if($netim_check_debug)
                $this->_logNetim(__FUNCTION__, "", $domain, $domains);
            return array("result" => $domains);
        }

        /**
         * Retrieve general information for a given domain.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
         *
         * @return array array(id,domain,expiration,registrationstatus,purchasestatus,autorenew)
         */

        function getGeneralInfo($params)
        {
            throw new CE_Exception("prout");

            $data = array();
            $domain    = $params["sld"].".".$params["tld"];
            $userPackage = new UserPackage($params['userPackageId']);

            //If domain is not pending
            if($userPackage->status != PACKAGE_STATUS_PENDING)
            {
                // Call API connect 
                try {
                    $api = Netim\Core\getAPI($params);
                } catch (NetimAPIException $fault) {
                    throw new CE_Exception("API connect error",EXCEPTION_CODE_CONNECTION_ISSUE);
                }

                // Call API domainInfo 
                try {
                    $domainInfo = $api->domainInfo($domain);
                } catch (NetimAPIException $fault) {
                    //Domain not under management
                    if(preg_match("#E15-M1502#",$fault->getMessage()))
                        throw new CE_Exception($fault->getMessage());
 
                    $this->_logNetim(__FUNCTION__, "", $domain, $data);
                    return $data;
                }
                finally {
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                }

                // Build result
                $data = array(
                    'id' => '',
                    'domain' => $domain,
                    'expiration' => date("m/d/Y", strtotime($domainInfo->dateExpiration)),
                    'registrationstatus' => preg_match("#QUARANTINE#",$domainInfo->status) ? "RGP" : $domainInfo->status,
                    'purchasestatus' => preg_match("#PENDING#",$domainInfo->status) ? "Pending" : "Done",
                    'autorenew' => $domainInfo->autorenew,
                    'is_registered' => !preg_match("#PENDING#",$domainInfo->status),
                    'is_expired' => preg_match("#EXPIRED#",$domainInfo->status)
                );

            }

            $this->_logNetim(__FUNCTION__, "", $domain, $data);
            return $data;
        }

        /**
         * Carry out the domain name registration.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld, NumYears, RegistrantOrganizationName, RegistrantFirstName, RegistrantLastName, RegistrantEmailAddress, RegistrantPhone, RegistrantAddress1, RegistrantCity, RegistrantProvince, RegistrantPostalCode, RegistrantCountry, DomainPassword, ExtendedAttributes, NSx (list of nameservers if set, and usedns.
         *
         * @return  string
         *          CE_Exception
         */
        function doRegister($params):string
        {
            $userPackage = new UserPackage($params['userPackageId']);
            $domain = $userPackage->getCustomField('Domain Name');
             
            // Shall we proceed with this action
            if($userPackage->getCustomField('Registration Option') == 1)
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("Registration not allowed according to the order option"));             

            if(Netim\Database\getAsyncRequest($this->db,'domainCreate', $domain))
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("This domain name is already under processing"));    

            // Call registerDomain
            $result = $this->registerDomain($this->buildRegisterParams($userPackage, $params));

            if ($result->STATUS == "Done") // Registration is successfull
            {
                $userPackage->setCustomField("Registrar Order Id", $result->ID_OPE);
                $userPackage->status = PACKAGE_STATUS_ACTIVE;
                $userPackage->save();          

                $packageLog = Package_EventLog::newInstance(false, $userPackage->getCustomerId(), $userPackage->getID(), PACKAGE_EVENTLOG_CHANGEDSTATUS, 0, "ACTIVE");
                $packageLog->save();
                
                $this->_logNetim(__FUNCTION__, "sync", $domain, $result->ID_OPE);
                return $this->user->lang('%s has been registered',$domain);
            }
            else if ($result->STATUS == "Pending") // Registration is submitted but pending
            {
                $userPackage->setCustomField("Registrar Order Id", $result->ID_OPE);

                // Record Asynchronous request
                Netim\Database\addAsyncRequest($this->db, $result->ID_OPE, "domainCreate", $domain);

                $this->_logNetim(__FUNCTION__, "async", $domain, $result->ID_OPE);
                return $this->user->lang('%s registration is submitted at the registrar with id %s and is under processing',$domain,$result->ID_OPE);
            }
            else if ($result->STATUS == "Failed" || !$result) // Registration failed
            { 
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to register domain: %s',$result->MESSAGE));    
            }
        }

        function parseAadditionalfields($vars,$tld,&$contact)
        {            
            //Parse all $vars into additional fields
            $contact->setCompanyNumber(isset($vars["companyNumber"]) ? $vars["companyNumber"] : "");
            $contact->setTmName(isset($vars["tmName"]) ? $vars["tmName"] : "");
            $contact->setTmNumber(isset($vars["tmNumber"]) ? $vars["tmNumber"] : "");
            $contact->setTmType(isset($vars["tmType"]) ? $vars["tmType"] : "");
            $contact->setTmDate(isset($vars["tmDate"]) ? $vars["tmDate"] : "");
            $contact->setVatNumber(isset($vars["vatNumber"]) ? $vars["vatNumber"] : "");
            $contact->setBirthDate(isset($vars["birthDate"]) ? $vars["birthDate"] : "");
            $contact->setBirthZipCode(isset($vars["birthZipCode"]) ? $vars["birthZipCode"] : "");
            $contact->setBirthCity(isset($vars["birthCity"]) ? $vars["birthCity"] : "");
            $contact->setBirthCountry(isset($vars["birthCountry"]) ? $vars["birthCountry"] : "");
            $contact->setIdNumber(isset($vars["idNumber"]) ? $vars["idNumber"] : "");

            //If the companyName exists, we replace the bodyName
            if(isset($vars["companyName"]) && !empty($vars["companyName"]))
                $contact->setBodyName($vars["companyName"]);

            //If the firstName exists, we replace the firstName
            if(isset($vars["firstName"]) && !empty($vars["firstName"]))
                $contact->setFirstName($vars["companyName"]);

            //If the lastName exists, we replace the bodyName
            if(isset($vars["lastName"]) && !empty($vars["lastName"]))
                $contact->setLastName($vars["companyName"]);
            
            //Additional fields
            $additional=array();
            $additional_fields_settings=Netim\Core\getAdditionalFields(".".$tld);
            
            if($additional_fields_settings) {
                foreach($additional_fields_settings as $field) {
                    if(isset($vars[$field->Key]) && preg_match("#_#",$field->Key)) {
                        if(strpos($field->Key, '|') !== false) {
                            $k=strstr($field->Key, '|', true);
                            $additional[$k][$vars['domain']]=$vars[$field->Key];
                        }
                        else
                            $additional[$field->Key]= $vars[$field->Key];
                    }   
                }     
            }

            $contact->setAdditional($additional);

            $this->_logNetim(__FUNCTION__, "", "", $contact);
        }
    
        function registerDomain($params):object
        {
            include (dirname(__FILE__). '/config.inc.php');

            // Domain Details
            $tld       = $params["tld"];
            $sld       = $params["sld"];
            $domain    = $sld.".".$tld;
            $duration  = $params["NumYears"];
            $ns1       = $params["DNS 1"];
            $ns2       = $params["DNS 2"];
            $ns3       = $params["DNS 3"];
            $ns4       = $params["DNS 4"];
            $ns5       = $params["DNS 5"];

            // Addons
            $trusteeService = isset($params["package_addons"]) && isset($params["package_addons"]["CUSTOM_TRUSTEE"]) && $params["package_addons"]["CUSTOM_TRUSTEE"] == "Yes";
            $localContactService = isset($params["package_addons"]) && isset($params["package_addons"]["CUSTOM_LOC"]) && $params["package_addons"]["CUSTOM_LOC"] == "Yes";

            // Call API connect 
            try {
                $api = Netim\Core\getAPI($params);
            } catch (NetimAPIException $fault) {
                throw new CE_Exception("API connect error",EXCEPTION_CODE_CONNECTION_ISSUE);
            }

            // Call API domainTldInfo to check addons feature 
            if($trusteeService || $localContactService) {
                try {
                    $tldInfo = $api->domainTldInfo($tld);
                    if(empty($tldInfo))
                        $this->_HandleException(__FUNCTION__, "domainTldInfo", $domain, $this->user->lang("Failed to query tld info: no data returned"));
                }
                catch (NetimAPIException $exception) {
                    $this->_HandleException(__FUNCTION__, "domainTldInfo", $domain, $this->user->lang("Failed to query tld info: %s",$exception->GetMessage()));            
                }
                finally {
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                }
            }

            if($trusteeService && $tldInfo->HasTrusteeService == "0")
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("Trustee service is not supported by this extension"));    
 
            if($localContactService && $tldInfo->HasLocalContactService == "0")
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("Local contact service is not supported by this extension"));    
 
            // Registrant Details
            $contact = new NormalizedContact(
                $params["RegistrantFirstName"], 
                $params["RegistrantLastName"], 
                $params["RegistrantOrganizationName"], 
                $params["RegistrantAddress1"], 
                $params["RegistrantAddress2"], 
                $params["RegistrantPostalCode"], 
                $params["RegistrantStateProvince"], 
                $params["RegistrantCountry"], 
                $params["RegistrantCity"], 
                $params["RegistrantPhone"],
                $params["RegistrantEmailAddress"],
                'EN', 1);            
        
            // Manage additional domain fields
            $this->parseAadditionalfields($params["ExtendedAttributes"],$tld,$contact);
       
            // Call API to create contacts
            try {
                // Trustee service or client
                if($trusteeService) {
                    $idOwner="";
                    foreach($trusteeID as $key=>$value) {
                        if(in_array($tld,$value))
                             $idOwner=$key;
                    }

                    $this->_logNetim(__FUNCTION__, "TrusteeService ID", $domain, $idOwner);
                    if(empty($idOwner))
                        $this->_HandleException(__FUNCTION__, "TrusteeService ID", $domain, $this->user->lang("Misconfiguration of trustee service"));  
                }
                else {
                    $idOwner = $api->contactCreateObj($contact);
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                }     

                // Local contact service or client
                $contact->setIsOwner(false);
                $idContact = $api->contactCreateObj($contact);
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);

                if($localContactService) {
                    $idAdmin="";
                    foreach ($localcontactID as $key => $value) {
                        if(in_array($tld,$value))
                            $idAdmin=$key;
                    }

                    $this->_logNetim(__FUNCTION__, "LocalContactService ID", $domain, $idAdmin);
                    if(empty($idAdmin))
                        $this->_HandleException(__FUNCTION__, "LocalContactService ID", $domain, $this->user->lang("Misconfiguration of local contact service"));  
                }
                else
                    $idAdmin = $idContact;  
            }
            catch (NetimAPIException $exception) {       
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                $this->_HandleException(__FUNCTION__, "contactCreateObj", $domain, $this->user->lang("Failed to create contacts: %s",$exception->GetMessage()));  
            }

            // Call API domainCreate
            try {
                $result = $api->domainCreate($domain, $idOwner, $idAdmin, $idContact, $idContact, $ns1, $ns2, $ns3, $ns4, $ns5, $duration);
            } 
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to register domain: %s',$exception->GetMessage()));  
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            return $result;
        }

        /**
         * Carry out the domain name transfer.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld, NumYears, RegistrantOrganizationName, RegistrantFirstName, RegistrantLastName, RegistrantEmailAddress, RegistrantPhone, RegistrantAddress1, RegistrantCity, RegistrantProvince, RegistrantPostalCode, RegistrantCountry, DomainPassword, ExtendedAttributes, NSx (list of nameservers if set, and usedns.
         *
         * @return  string
         *          CE_Exception
         */
        function doDomainTransferWithPopup($params):string
        {
            $userPackage = new UserPackage($params['userPackageId']);
            $domain = $userPackage->getCustomField('Domain Name');
            
            // Shall we proceed with this action
            if($userPackage->getCustomField('Registration Option') == 0) 
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("Transfer not allowed according to the order option"));  

            if(Netim\Database\getAsyncRequest($this->db,'domainTransferTrade', $domain) || Netim\Database\getAsyncRequest($this->db,'domainTransferIn', $domain))                
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("This domain name is already under processing")); 
   
            // Call transferDomain
            $p=$this->buildTransferParams($userPackage, $params);
            if ($addons = $userPackage->getAddons()) // Missing in RegistrarPlugin.buildTransferParams
                $p['package_addons'] = $userPackage->getPackageAddons($addons);
            $result = $this->transferDomain($p);

            if ($result->STATUS == "Pending") // Transfer is submitted but pending
            {
                $userPackage->setCustomField('Transfer Status', $result->ID_OPE);
                $userPackage->setCustomField("Registrar Order Id", $result->ID_OPE);
                
                // Record Asynchronous request
                Netim\Database\addAsyncRequest($this->db, $result->ID_OPE, $result->TYPE, $domain);

                $this->_logNetim(__FUNCTION__, "", $domain, $result->ID_OPE);
                return $this->user->lang('%s transfer is submitted at the registrar with id %s and is under processing',$domain,$result->ID_OPE);
            }
            else if ($result->STATUS == "Failed" || !$result) // Transfer failed
            { 
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to transfer domain: %s',$result->MESSAGE));    
            }
        }

        function transferDomain($params)
        {  
            include (dirname(__FILE__). '/config.inc.php');

            // Domain Details
            $tld       = $params["tld"];
            $sld       = $params["sld"];
            $domain    = $sld.".".$tld;
            $duration  = 1;
            $ns1       = $params["DNS 1"];
            $ns2       = $params["DNS 2"];
            $ns3       = $params["DNS 3"];
            $ns4       = $params["DNS 4"];
            $ns5       = $params["DNS 5"];
            $eppcode   = $params["eppCode"];

            // Addons
            $trusteeService = isset($params["package_addons"]) && isset($params["package_addons"]["CUSTOM_TRUSTEE"]) && $params["package_addons"]["CUSTOM_TRUSTEE"] == "Yes";
            $localContactService = isset($params["package_addons"]) && isset($params["package_addons"]["CUSTOM_LOC"]) && $params["package_addons"]["CUSTOM_LOC"] == "Yes";

            // Call API connect 
            try {
                $api = Netim\Core\getAPI($params);
            } catch (NetimAPIException $fault) {
                throw new CE_Exception("API connect error",EXCEPTION_CODE_CONNECTION_ISSUE);
            }

            // Call API domainTldInfo to check addons feature 
            if($trusteeService || $localContactService) {
                try {
                    $tldInfo = $api->domainTldInfo($tld);
                    if(empty($tldInfo))
                        $this->_HandleException(__FUNCTION__, "domainTldInfo", $domain, $this->user->lang("Failed to query tld info: no data returned"));
                }
                catch (NetimAPIException $exception) {
                    $this->_HandleException(__FUNCTION__, "domainTldInfo", $domain, $this->user->lang("Failed to query tld info: %s",$exception->GetMessage()));            
                }
                finally {
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                }
            }

            if($trusteeService && $tldInfo->HasTrusteeService == "0")
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("Trustee service is not supported by this extension"));    
 
            if($localContactService && $tldInfo->HasLocalContactService == "0")
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("Local contact service is not supported by this extension"));    
 
            // Registrant Details
            $contact = new NormalizedContact(
                $params["RegistrantFirstName"], 
                $params["RegistrantLastName"], 
                $params["RegistrantOrganizationName"],
                $params["RegistrantAddress1"], 
                $params["RegistrantAddress2"], 
                $params["RegistrantPostalCode"], 
                $params["RegistrantStateProvince"],
                $params["RegistrantCountry"], 
                $params["RegistrantCity"], 
                $params["RegistrantPhone"], 
                $params["RegistrantEmailAddress"],
                 'EN', 1
            );
            
            // Call API to create contacts
            try {
                // Trustee service or client
                if($trusteeService) {
                    $idOwner="";
                    foreach($trusteeID as $key=>$value) {
                        if(in_array($tld,$value))
                             $idOwner=$key;
                    }

                    $this->_logNetim(__FUNCTION__, "TrusteeService ID", $domain, $idOwner);
                    if(empty($idOwner))
                        $this->_HandleException(__FUNCTION__, "TrusteeService ID", $domain, $this->user->lang("Misconfiguration of trustee service"));  
                }
                else {
                    $idOwner = $api->contactCreateObj($contact);
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                }     

                // Local contact service or client
                $contact->setIsOwner(false);
                $idContact = $api->contactCreateObj($contact);
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);

                if($localContactService) {
                    $idAdmin="";
                    foreach ($localcontactID as $key => $value) {
                        if(in_array($tld,$value))
                            $idAdmin=$key;
                    }

                    $this->_logNetim(__FUNCTION__, "LocalContactService ID", $domain, $idAdmin);
                    if(empty($idAdmin))
                        $this->_HandleException(__FUNCTION__, "LocalContactService ID", $domain, $this->user->lang("Misconfiguration of local contact service"));  
                }
                else
                    $idAdmin = $idContact;  
            }
            catch (NetimAPIException $exception) {       
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                $this->_HandleException(__FUNCTION__, "contactCreateObj", $domain, $this->user->lang("Failed to create contacts: %s",$exception->GetMessage()));  
            }
            
            // Call API domainCreate
            try {
                if($request_type=="domainTransferTrade")  // Request a domain transfer with change of domain holder to Trustee     
                    $result = $api->domainTransferTrade($domain, $eppcode, $idOwner, $idAdmin, $idContact, $idContact, $ns1, $ns2, $ns3, $ns4, $ns5);
                else // Request a regular domain transfer 
                    $result = $api->domainTransferIn($domain, $eppcode, $idOwner, $idAdmin, $idContact, $idContact, $ns1, $ns2, $ns3, $ns4, $ns5);
            } 
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to transfer domain: %s',$exception->GetMessage()));  
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }     

            return $result;
        }

        /**
         * Carry out the domain name renewal.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld, NumYears, RegistrantOrganizationName, RegistrantFirstName, RegistrantLastName, RegistrantEmailAddress, RegistrantPhone, RegistrantAddress1, RegistrantCity, RegistrantProvince, RegistrantPostalCode, RegistrantCountry, DomainPassword, ExtendedAttributes, NSx (list of nameservers if set, and usedns.
         *
         * @return  string
         *          CE_Exception
         */
        function doRenew($params):string
        {
            $userPackage = new UserPackage($params['userPackageId']);
            $domain = $userPackage->getCustomField('Domain Name');

            // Shall we proceed with this action
            if($userPackage->status == PACKAGE_STATUS_PENDING)
                return $this->user->lang("This domain is currently not active");

            if(Netim\Database\getAsyncRequest($this->db, 'domainRenew', $domain))
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("A request is already pending for this domain"));

            // Call renewDomain
            $params['domain'] = $domain;
            $result = $this->renewDomain($this->buildRenewParams($userPackage, $params));
            
            if ($result->STATUS == "Done") {
                // Renewal is successfull
                $userPackage->setCustomField("Registrar Order Id", null);

                // Call API domainInfo to get new expiration date
                try  {
                    $api = Netim\Core\getAPI($params);
                    $domainInfo = $api->domainInfo($domain);
                    $userPackage->setCustomField('Expiration Date', strtotime($domainInfo->dateExpiration));
                }
                catch (NetimAPIException $exception) {
                    $this->_HandleException(__FUNCTION__, "domainInfo", $domain, $this->user->lang("Failed to query domain for expiration date: %s",$exception->GetMessage()));
                }
                finally {
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                }

                $data = array("Domain"=>$domain, "Expiration Date"=>$domainInfo->dateExpiration);
                $packageLog = Package_EventLog::newInstance(false, $userPackage->getCustomerId(), $userPackage->getID(), PACKAGE_EVENTLOG_UPDATED, 0, serialize($data));
                $packageLog->save();

                $this->_logNetim(__FUNCTION__, "renewal", $domain, $result->STATUS);
                return $this->user->lang('%s has been renewed',$domain); 
            }
            else if ($result->STATUS == "Pending") {
                // Renewal is submitted but pending
                $userPackage->setCustomField("Registrar Order Id", $result->ID_OPE);

                $this->_logNetim(__FUNCTION__, "renewal", $domain, $result->ID_OPE);

                // Record Asynchronous request
                Netim\Database\addAsyncRequest($this->db, $result->ID_OPE, "domainRenew", $domain);

                return $this->user->lang('%s renewal is submitted at the registrar with id %s and is under processing',$domain,$result->ID_OPE);
            }
            else if ($result->STATUS == "Failed" || !$result) {
                // Renewal failed
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to renew domain: %s',$result->MESSAGE)); 
            }
        }

        /**
         * Renew domain name
         *
         * @param array $params
         * 
         * @return Object
         */
        function renewDomain($params)
        {
            $domain = $params['domain'];
            $duration = $params['NumYears'];

            // Call to API domainRenew
            try {
                $api = Netim\Core\getAPI($params);
                $res = $api->domainRenew($domain, $duration);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to renew domain: %s',$exception->GetMessage()));  
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            return $res;
        }


        /**
         * Action to delete a given domain name
         *
         * @param array $params
         * 
         * @return string Message
         */
        function doDelete($params):string
        {
            $userPackage = new UserPackage($params['userPackageId']);
            $domain = $userPackage->getCustomField('Domain Name');

            // Shall we proceed with this action
            if($userPackage->status == PACKAGE_STATUS_PENDING)
                return $this->user->lang("This domain is currently not active");

            if(Netim\Database\getAsyncRequest($this->db, 'domainDelete', $domain)) 
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("A request is already pending for this domain"));

            // Call deleteDomain
            $params['domain'] = $domain;
            $result = $this->deleteDomain($params);

            if ($result->STATUS == "Done")
            {
                // Deletion is successfull
                $userPackage->status = PACKAGE_STATUS_CANCELLED;
                $userPackage->save();
                $packageLog = Package_EventLog::newInstance(false, $userPackage->getCustomerId(), $userPackage->getID(), PACKAGE_EVENTLOG_CHANGEDSTATUS, 0, "CANCELLED");
                $packageLog->save();
                $this->_logNetim(__FUNCTION__, "", $domain, $result->STATUS);
                return $this->user->lang('%s has been deleted at the registry',$domain);
            }
            else if ($result->STATUS == "Pending")
            {
                // Deletion is submitted but pending
                Netim\Database\addAsyncRequest($this->db, $result->ID_OPE, "domainDelete", $domain);
                $this->_logNetim(__FUNCTION__, "", $domain, $result->ID_OPE);
                return $this->user->lang('%s deletion is submitted at the registrar with id %s and is under processing',$domain,$result->ID_OPE);
            }
            else if ($result->STATUS == "Failed" || !$result) { 
                // Deletion failed
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to delete domain: %s',$result->MESSAGE));
            }
        }

        /**
         * Delete a given domain name
         *
         * @param array $params
         * 
         * @return boolean
         */
        function deleteDomain($params)
        {
            $domain = $params['domain'];

            // Call to API domainDelete    
            try {
                $api = Netim\Core\getAPI($params);
                $res = $api->domainDelete($domain, 'NOW');
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to delete domain: %s',$exception->GetMessage()));  
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            return $res;
        }

        /**
         * Action to toggle DnsSec for a given domain.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
         *
         * @return array CE_Error on failure
         */
        function doSetDnsSec($params)
        {
            $userPackage = new UserPackage($params['userPackageId']);
            $domain = $userPackage->getCustomField('Domain Name');

            // Shall we proceed with this action
            if($userPackage->status == PACKAGE_STATUS_PENDING)
                return $this->user->lang("This domain is currently not active");

            if(Netim\Database\getAsyncRequest($this->db, 'domainSetDNSSec', $domain))
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("A request is already pending for this domain"));

            // Call setDnsSec
            $params['domain'] = $domain;
            $result = $this->setDnsSec($params);
   
            if($result[0]->STATUS == "Pending" || $result[0]->STATUS == "Done")
            {
                // DNSsec update is submitted
                Netim\Database\addAsyncRequest($this->db, $result[0]->ID_OPE, "domainSetDNSSec", $domain);
                $this->_logNetim(__FUNCTION__, "", $domain, $result[0]->ID_OPE);
                return $this->user->lang('%s DNSSec update is submitted at the registrar with id %s and is under processing',$domain,$result[0]->ID_OPE);
            }
            else if ($result[0]->STATUS == "Failed" || !$result)
            {
                // DNSsec update failed
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to update domain: %s',$result->MESSAGE));
            }
        }

        function setDnsSec($params)
        {
            $domain = $params['domain'];

            // Call API domainInfo
            try {
                $api = Netim\Core\getAPI($params);
                $domainInfo = $api->domainInfo($domain);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainInfo", $domain, $this->user->lang("Failed to query domain info: %s",$exception->GetMessage()));            
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            // Has DNS 4 service ?
            if(!$domainInfo->HasDNS4Service)
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('This domain name doesn\'t use the nameservers for DNS service'));
            
            // Call to API domainSetDNSSec   
            $newstatus = $domainInfo->isSigned ? 0 : 1;
            try {
                $res = array($api->domainSetDNSSec($params['domain'], $newstatus), false);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainSetDNSSec", $domain, $this->user->lang('Failed to update domain: %s',$exception->GetMessage()));  
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $params['domain'], $api);
            }

            return $res;
        }
 
        /**
         * Action to set Registrar lock for a given domain.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
         *
         * @return array CE_Error on failure
         */
        function doSetRegistrarLock($params)
        {
            $userPackage = new UserPackage($params['userPackageId']);
            $domain = $userPackage->getCustomField('Domain Name');

            // Shall we proceed with this action
            if($userPackage->status == PACKAGE_STATUS_PENDING)
                return $this->user->lang("This domain is currently not active");
                        
            // Call setRegistrarLock
            $params['domain'] = $domain;
            $result = $this->setRegistrarLock($params);

            if($result)
                return $this->user->lang("Registrar lock for domain %s is now enabled",$domain);
            else
                return $this->user->lang("Registrar lock for domain %s is now disabled",$domain);
        }

        /**
         * Set Registrar lock for a given domain.
         *
         * @param array $params
         * 
         * @return boolean
         */
        function setRegistrarLock($params)
        {
            $domain = $params['domain'];

            // Call API domainInfo
            try {
                $api = Netim\Core\getAPI($params);
                $domainInfo = $api->domainInfo($domain);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainInfo", $domain, $this->user->lang("Failed to query domain info: %s",$exception->GetMessage()));            
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            // Call to API domainSetPreference
            $newstatus = $domainInfo->domainIsLock ? 0 : 1;    
            try {
                $res = $api->domainSetPreference($domain, 'registrar_lock', $newstatus);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainSetPreference", $domain, $this->user->lang('Failed to update domain: %s',$exception->GetMessage()));  
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $params['domain'], $api);
            }
           
            return $newstatus;
        }

        /**
         * Retrieve the registrar lock information for a given domain.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
         *
         * @return boolean
         */
        function getRegistrarLock($params)
        {
            throw new CE_Exception("prout");
            
            $domain    = $params["sld"].".".$params["tld"];
            $userPackage = new UserPackage($params['userPackageId']);

            // Shall we proceed with this action
            if($userPackage->status == PACKAGE_STATUS_PENDING)
                return false;

            // Call API domainInfo 
            try {
                $api = Netim\Core\getAPI($params);
                $domainInfo = $api->domainInfo($domain);
            } catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainInfo", $domain, $this->user->lang('Failed to get domain information: %s',$exception->GetMessage())); 
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            return ($domainInfo->domainIsLock == 1);
        }   

        /**
         * Action to set Whois privacy lock for a given domain.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
         *
         * @return array CE_Error on failure
         */
        public function doSetPrivacyWhois($params):string
        {
            $userPackage = new UserPackage($params['userPackageId']);
            $domain = $userPackage->getCustomField('Domain Name');

            // Shall we proceed with this action
            if($userPackage->status == PACKAGE_STATUS_PENDING)
                return $this->user->lang("This domain is currently not active");
        
            // Call setPrivacyWhois
            $params['domain'] = $domain;
            $result = $this->setPrivacyWhois($params);

            if($result)
                return $this->user->lang("RegiWhois privacy for domain %s is now enabled",$domain);
            else
                return $this->user->lang("Whois privacy for domain %s is now disabled",$domain);
        }

        /**
         * Set Whois privacy for a given domain.
         *
         * @param array $params
         * 
         * @return boolean
         */
        public function setPrivacyWhois($params)
        {
            $domain = $params['domain'];

            // Call API domainInfo
            try {
                $api = Netim\Core\getAPI($params);
                $domainInfo = $api->domainInfo($domain);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainInfo", $domain, $this->user->lang("Failed to query domain info: %s",$exception->GetMessage()));            
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            // Call to API domainSetPreference   
            $newstatus = $domainInfo->whoisPrivacy ? 0 : 1;
            try {
                $res = $api->domainSetPreference($domain, 'whois_privacy', $newstatus);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainSetPreference", $domain, $this->user->lang('Failed to update domain: %s',$exception->GetMessage()));  
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $params['domain'], $api);
            }
                                 
            return $newstatus;
        }

        /**
         * Action to send the transfer key to registrant.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
         *
         * @return array CE_Error on failure
         */
        function doSendTransferKey($params)
        {
            $userPackage = new UserPackage($params['userPackageId']);
            $domain = $userPackage->getCustomField('Domain Name');
            
            // Shall we proceed with this action
            if($userPackage->status == PACKAGE_STATUS_PENDING)
                return $this->user->lang("This domain is currently not active");

            // Call sendTransferKey
            $params['domain'] = $domain;
            $this->sendTransferKey($params);

            return $this->user->lang("Transfer key will be sent to registrant by email in few instant");
        }

        /**
         * Send the transfer key to registrant.
         *
         * @param array $params
         * 
         * @return boolean
         */
        function sendTransferKey($params)
        {
            $domain = $params['domain'];

            // Call to API domainAuthID
            try {
                $api = Netim\Core\getAPI($params);
                $result = $api->domainAuthID($params['domain'],1);
            } catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainSetPreference", $domain, $this->user->lang('Failed to send transfer key: %s',$exception->GetMessage()));  
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }
            return true;
        }

        /**
         * Set Autorenew on domain
         *
         * @param array $params
         */
        function setAutorenew($params)
        {
            // This feature is not implemented by choice
            throw new CE_Exception($this->user->lang("Auto Registration Renewal at the registrar is not implemented"));
        }

        function disableRenewal($params)
         {
            // This feature is not implemented by choice
            throw new CE_Exception($this->user->lang("Auto Registration Renewal at the registrar is not implemented"));
        }       
        
        /**
         * Retrieve the contact information for a given domain.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
         *
         * @return array array('type' => array(contactField => contactValue))
         */
        function getContactInformation($params)
        {
            $data=[];
            $domain    = $params["sld"].".".$params["tld"];
            $userPackage = new UserPackage($params['userPackageId']);

            // Call API domainInfo
            try {
                $api = Netim\Core\getAPI($params);
                $domainInfo = $api->domainInfo($domain);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainInfo", $domain, $this->user->lang("Failed to query domain info: %s",$exception->GetMessage()));            
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            // Shall we manage contact information ?
            if(preg_match('/^NETIM4|^TRUST4|^#AUTO#/i',$domainInfo->idOwner))
            {
                $result = array( 'Registrant' => $data, 'Admin' => $data, 'Tech' => $data, 'Billing' => $data);
                $this->_logNetim(__FUNCTION__, "not editable", $domain, $result);
                return $result;
            }

            // Call API contactInfoObj
            try {
                $ownerInfo = $api->contactInfoObj($domainInfo->idOwner);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainInfo", $domain, $this->user->lang("Failed to query domain info: %s",$exception->GetMessage()));            
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            // Build result
            $data_owner = array(
                "Address 1" =>array($this->user->lang('Address').' 1', $ownerInfo->getAddress1()), 
                "Address 2" =>array($this->user->lang('Address').' 2', $ownerInfo->getAddress2()), 
                "Postal code"=> array($this->user->lang('Postal Code'), $ownerInfo->getZipCode()), 
                "City" => array($this->user->lang('City'), $ownerInfo->getCity()), 
                "State" => array($this->user->lang('State'), $ownerInfo->getArea()), 
                "Country" => array($this->user->lang('Country'), $ownerInfo->getCountry()), 
                "EmailAddress" => array($this->user->lang('Email'), $ownerInfo->getEmail()),
                "Phone" => array($this->user->lang('Phone'), $ownerInfo->getPhone())
            );

            $data_admin = array(
                /*
                'Organization Name' => array($this->user->lang('Organization'), $adminInfo->getBodyName()),
                'First Name' => array($this->user->lang('First Name'), $adminInfo->getFirstName()),
                'Last Name' => array($this->user->lang('Last Name'), $adminInfo->getLastName()),
                'Address 1' => array($this->user->lang('Address').' 1', $adminInfo->getAddress1()),
                'Address 2' => array($this->user->lang('Address').' 2', $adminInfo->getAddress2()),
                'Postal Code' => array($this->user->lang('Postal Code'), $adminInfo->getZipCode()),
                'City' => array($this->user->lang('City'), $adminInfo->getCity()),
                'State' => array($this->user->lang('State'), $adminInfo->getArea()),
                'Country'  => array($this->user->lang('Country'), $adminInfo->getCountry()),
                'EmailAddress' => array($this->user->lang('E-mail'), $adminInfo->getEmail()),
                'Phone' => array($this->user->lang('Phone'), $adminInfo->getPhone())
                */
            );

            $data_tech = array(
                /*
                'OrganizationName' => array($this->user->lang('Organization'), $techInfo->getBodyName()),
                'FirstName' => array($this->user->lang('First Name'), $techInfo->getFirstName()),
                'LastName' => array($this->user->lang('Last Name'), $techInfo->getLastName()),
                'Address1' => array($this->user->lang('Address').' 1', $techInfo->getAddress1()),
                'Address2' => array($this->user->lang('Address').' 2', $techInfo->getAddress2()),
                'PostalCode' => array($this->user->lang('Postal Code'), $techInfo->getZipCode()),
                'City' => array($this->user->lang('City'), $techInfo->getCity()),
                'State' => array($this->user->lang('State'), $techInfo->getArea()),
                'Country'  => array($this->user->lang('Country'), $techInfo->getCountry()),
                'EmailAddress' => array($this->user->lang('E-mail'), $techInfo->getEmail()),
                'Phone' => array($this->user->lang('Phone'), $techInfo->getPhone())
                */
            );

            $data_billing = array(
                /*
                'OrganizationName' => array($this->user->lang('Organization'), $billingInfo->getBodyName()),
                'FirstName' => array($this->user->lang('First Name'), $billingInfo->getFirstName()),
                'LastName' => array($this->user->lang('Last Name'), $billingInfo->getLastName()),
                'Address1' => array($this->user->lang('Address').' 1', $billingInfo->getAddress1()),
                'Address2' => array($this->user->lang('Address').' 2', $billingInfo->getAddress2()),
                'PostalCode' => array($this->user->lang('Postal Code'), $billingInfo->getZipCode()),
                'City' => array($this->user->lang('City'), $billingInfo->getCity()),
                'State' => array($this->user->lang('State'), $billingInfo->getArea()),
                'Country'  => array($this->user->lang('Country'), $billingInfo->getCountry()),
                'EmailAddress' => array($this->user->lang('E-mail'), $billingInfo->getEmail()),
                'Phone' => array($this->user->lang('Phone'), $billingInfo->getPhone())
                */
            );

            $data_admin = $data_tech = $data_billing = $data_owner;
            $result = array( 'Registrant' => $data_owner, 'Admin' => $data_admin, 'Tech' => $data_tech, 'AuxBilling' => $data_billing);
            $this->_logNetim(__FUNCTION__, "", $domain, $result);
            return $result;
        }

        /**
        * Set the contact information for a given domain.
        *
        * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
        */
        function setContactInformation($params)
        {
            $domain    = $params["sld"].".".$params["tld"];
            $userPackage = new UserPackage($params['userPackageId']);

            // Shall we proceed with this action
            if($userPackage->status == PACKAGE_STATUS_PENDING)
                throw new CE_Exception($this->user->lang("This domain is currently not active"));

            if(Netim\Database\getAsyncRequest($this->db, 'contactOwnerUpdateObj', $domain))
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("A request is already pending for this domain"));

            // Call API domainInfo
            try {
                $api = Netim\Core\getAPI($params);
                $idOwner = $api->domainInfo($domain)->idOwner;
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainInfo", $domain, $this->user->lang("Failed to query domain info: %s",$exception->GetMessage()));            
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            // Call API contactInfoObj
            try {
                $owner = $api->contactInfoObj($idOwner);
            }
            catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "domainInfo", $domain, $this->user->lang("Failed to query domain info: %s",$exception->GetMessage()));            
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }
          
            // Formating data
            $newOwner = new NormalizedContact(
                $owner->getFirstName(), 
                $owner->getLastName(), 
                $owner->getBodyName(),
                $params['Registrant_Address_1'], 
                $params['Registrant_Address_2'], 
                $params['Registrant_Postal_code'], 
                $params['Registrant_State'], 
                $params['Registrant_Country'],
                $params['Registrant_City'], 
                $params['Registrant_Phone'], 
                $params['Registrant_EmailAddress'], 
                "EN", 1);

            // Call API contactOwnerUpdateObj
            try {
               $res = $api->contactOwnerUpdateObj($idOwner, $newOwner) ;
            } catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "contactOwnerUpdateObj", $domain, $this->user->lang('Failed to update contact information: %s',$exception->GetMessage()));  
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            if ($res->STATUS == "Done")
                return $this->user->lang("%s contact information update is done",$domain);
            else if ($res->STATUS == "Pending") {
                // contactOwnerUpdateObj is submitted but pending
                Netim\Database\addAsyncRequest($this->db, $res->ID_OPE, "contactOwnerUpdateObj", $domain);
                $this->_logNetim(__FUNCTION__, "async", $domain, $res->ID_OPE);
                return $this->user->lang('%s contact information update is submitted at the registrar with id %s and is under processing',$domain,$res->ID_OPE);
            }
            else if ($result->STATUS == "Failed" || !$result) {
                // Update failed
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to update contact information: %s',$result->MESSAGE));
            }
        }

        /**
         * Retrieve the dns information for a given domain.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
         *
          * @return array array('type' => array(contactField => contactValue))
         */
        function getNameServers($params)
        {
            // Domain Details
            $domain    = $params["sld"].".".$params["tld"];

            // Package Details
            $userPackage = new UserPackage($params['userPackageId']);
   
            // Call API domainInfo 
            try {
                $api = Netim\Core\getAPI($params);
                $domainInfo = $api->domainInfo($domain);
            } catch (NetimAPIException $fault) {
                return false;
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            $this->_logNetim(__FUNCTION__, "", $domain, $domainInfo->ns);
            return $domainInfo->ns;
        }

        /**
         * Set the dns information for a given domain.
         *
         * @param array $params Contains the values for the variables defined in getVariables(), plus: tld, sld.
         */
        function setNameServers($params)
        {
            // Domain Details
            $domain    = $params["sld"].".".$params["tld"];
            
            // Package Details
            $userPackage = new UserPackage($params['userPackageId']);

            // Shall we proceed with this action
            if($userPackage->status == PACKAGE_STATUS_PENDING)
                throw new CE_Exception($this->user->lang("This domain is currently not active"));

            if(Netim\Database\getAsyncRequest($this->db,'domainChangeDNS', $domain))
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("A request is already pending for this domain"));

            // Prepare request
            $tabDNS = array();
            if ($params['default'] == false) {
                foreach ($params['ns'] as $key => $value)
                    $tabDNS[] = $value;
            } else {
                $tabDNS[] = $params['DNS 1'];
                $tabDNS[] = $params['DNS 2'];
                $tabDNS[] = $params['DNS 3'];
                $tabDNS[] = $params['DNS 4'];
                $tabDNS[] = $params['DNS 5'];
            }

            // Call API domainChangeDNS
            try {
                $api = Netim\Core\getAPI($params);
                $res = $api->domainChangeDNS($domain,$tabDNS[0] ?? "",$tabDNS[1] ?? "",$tabDNS[2] ?? "",$tabDNS[3] ?? "",$tabDNS[4] ?? "");
            } catch (NetimAPIException $exception) {
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to update domain: %s',$exception->GetMessage()));
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
            }

            if ($res->STATUS == "Done")
                return $this->user->lang("%s dns change is done",$domain);
            if ($res->STATUS == "Pending") {
                // Update is submitted but pending
                Netim\Database\addAsyncRequest($this->db, $res->ID_OPE, "domainChangeDNS", $domain);
                $this->_logNetim(__FUNCTION__, "async", $domain, $res->ID_OPE);
                throw new CE_Exception($this->user->lang('%s dns change is submitted at the registrar with id %s and is under processing',$domain,$res->ID_OPE));
            }
            else if ($result->STATUS == "Failed" || !$result) {
                // Update failed
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to update domain: %s',$result->MESSAGE));
            }
        }

        function getDNS($params)
        {
            $domain    = $params["sld"].".".$params["tld"];
            $userPackage = new UserPackage($params['userPackageId']);
            
            // Call API queryZoneList and queryWebFwdList
            try {
                $api = Netim\Core\getAPI($params);
                $info = $api->domainInfo($domain);
                $domZone = $api->queryZoneList($domain);
                $domRedirect = $api->queryWebFwdList($domain) ;
            } catch (NetimAPIException $exception) {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to get host records: %s',$exception->GetMessage()));
            }

            // Building records
            $hostrecords = array(); 
            $i = 1;
            foreach ($domZone as $record) {
                $type= strtoupper($record->type);
                $value= $record->value;
                $hostname = $record->host==$domain ? $record->host : str_replace(".".$domain,"",$record->host);     

                if (in_array($type, ['CNAME', 'MX', 'TXT']))
                    $hostrecords[] = array( "id"=> $i,"hostname" => $hostname, "type" => $type, "address" => $value);
                else if (in_array($type, ['A', 'AAAA']) && !empty($hostname))
                {
                    //Subdomain with possible URL forwarding
                    //If a forward exist, it replaces the dns record to avoid 2 entries in the list
                    $find = false;
                    
                    foreach ($domRedirect as $val) {
                        $hostname2 = str_replace(".".$domain,"",$val->FQDN); 
                        if ($hostname == $hostname2)
                        {
                            $type = $val->type=='DIRECT' ? "URL" : "FRAME";
                            $hostrecords[] = array( "id"=> $i, "hostname" => $hostname2, "type" => $type, "address" => $val->options->protocol."://".$val->target );
                            $find = true;
                        }
                    }
                    
                    // No forwarding
                    if (!$find)
                        $hostrecords[] = array( "id"=> $i,"hostname" => $hostname, "type" => $type, "address" => $value);
                } else if (!in_array($type, ['NS']))
                    $hostrecords[] = array( "id"=> $i,"hostname" => $hostname, "type" => $type, "address" => $value);
                
                $i++;
            }

            $default = $info->HasDNS4Service;
            $result = array('records' => $hostrecords, 'types' => $this->dnstypes, 'default' => $default);
            $this->_logNetim(__FUNCTION__, "", $domain, $result);
            return $result;
        }

        function setDNS($params)
        {
            $domain    = $params["sld"].".".$params["tld"];
            $userPackage = new UserPackage($params['userPackageId']);

            // Call API queryZoneList and queryWebFwdList
            try {
                $api = Netim\Core\getAPI($params);
                $domZone = $api->queryZoneList($domain);
                $domRedirect = $api->queryWebFwdList($domain) ;
            } catch (NetimAPIException $exception) {
                $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang('Failed to get host records: %s',$exception->GetMessage()));
            }        

            // Current Host records Details
            $curdnsRR = array();
            foreach ($domZone as $zoneRR) {
                $hostname = $zoneRR->host==$domain ? $zoneRR->host : str_replace(".".$domain,"",$zoneRR->host);
                $type=$zoneRR->type;
                $address=$zoneRR->value;
                $key="$hostname#$type#$address";
 
                //Bypass record types not supported in the feature
                if(!in_array($type,$this->dnstypes))
                    continue;    

                //Subdomain with possible URL forwarding
                //If a forward exist, it replaces the dns record
                $find = false;
                foreach ($domRedirect as $val) {
                    $hostname2 = str_replace(".".$domain,"",$val->FQDN); 
                    //if (in_array($type, ['A', 'AAAA']) && !empty($hostname))
                    {
                        if ($hostname == $hostname2 && in_array($val->type, ['DIRECT', 'MASKED'])) {
                            $type = $val->type=='DIRECT' ? "URL" : "FRAME";
                            $address=$val->options->protocol."://".$val->target;
                            $key="$hostname#$type#$address";
                            $curdnsRR[$key] = array( "hostname" => $hostname, "type" => $type, "address" => $address );
                            $find = true;
                        }
                    }
                }

                // No forwarding
                if (!$find)
                    $curdnsRR[$key] = array( "hostname" => $hostname, "type" => $type, "address" => $address);
            }

            // New Host records Details
            $newdnsRR = array();
            foreach ($params["records"] as $key => $value) {
                $hostname=trim($value["hostname"]);
                $type=$value["type"];
                $address=trim($value["address"]);
                $key="$hostname#$type#$address";

                //Bypass record types not supported in the feature
                if(!in_array($type,$this->dnstypes))
                    continue;

                $newdnsRR[$key] = array( "hostname" => $hostname, "type" => $type, "address" => $address);
            }          

            // Removed records + updated ones
            $diff = array_diff_key($curdnsRR,$newdnsRR);
            foreach($diff as $key=>$value)
            {
                try {
                    if (in_array($value["type"], ['URL', 'FRAME']))
                    {
                        // It is a web forward
                        if(!preg_match('#$domain#',$value["hostname"]))
                            $fqdn=$value["hostname"].".".$domain;
                        else
                            $fqdn=$value["hostname"];

                        $result = $api->domainWebFwdDelete($fqdn);
                    }
                    else
                    {
                        // It is a regular dns record
                        $h = $value["hostname"]==$domain ? '' : str_replace(".".$domain,"",$value["hostname"]);
                        $result = $api->domainZoneDelete($domain,$h, $value["type"],$value["address"]);
                    }
                } catch (NetimAPIException $exception) {
                    $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("Failed to delete host record $key: %s",$exception->GetMessage()));
                }
                finally {
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                }
            }

            // Added records + updated
            $diff = array_diff_key($newdnsRR,$curdnsRR);
             foreach($diff as $key=>$value)
            {
                $structOptionsZone = array();
                $structOptionsZone["service"] = "";
                $structOptionsZone["protocol"] = "";
                $structOptionsZone["ttl"] = "";
                $structOptionsZone["weight"] = "";
                $structOptionsZone["port"] = "";
                $structOptionsZone["priority"] = 20; // Mandatory but used for MX

                try {     
                    if (in_array($value["type"], ['URL', 'FRAME']))
                    {
                        // It is a web forward
                        if(!preg_match('#$domain#',$value["hostname"]))
                            $fqdn=$value["hostname"].".".$domain;
                        else
                            $fqdn=$value["hostname"];   
                            
                        $url= parse_url($value["address"]);

                        $structOptionsFwd = array();
                        $structOptionsFwd["header"] = $value["type"]=='URL' ? 302 : "";
                        $structOptionsFwd["protocol"] = $url["scheme"];
                        $structOptionsFwd["title"] = "";
                        $structOptionsFwd["parking"] = "";

                        $typeFwd = $value["type"]=='URL' ? "DIRECT" : "MASKED";
                        $result = $api->domainWebFwdCreate($fqdn ,$value["address"], $typeFwd, $structOptionsFwd);
                    }
                    else
                    {    
                        // It is a regular dns record
                        $h = $value["hostname"]==$domain ? '' : str_replace(".".$domain,"",$value["hostname"]);
                        $result = $api->domainZoneCreate($domain, $h, $value["type"], $value["address"], $structOptionsZone);
                    }
                } catch (NetimAPIException $fault) {
                    $this->_HandleException(__FUNCTION__, "", $domain, $this->user->lang("Failed to add host record $key: %s",$exception->GetMessage()));
                }
                finally {
                    $this->_logAPIRequest(__FUNCTION__, $domain, $api);
                }
            }

            return true;
        }

        public function getTLDsAndPrices($params)
        {   
            include (dirname(__FILE__). '/config.inc.php');

            // Download TLD prices
            $username = strtoupper($params['Login']);
            $password = $params['Password'];
	
            if (!function_exists('curl_init'))
                throw new CE_Exception("Curl functions are not available<br>Please check PHP pre-requisites at https://support.netim.com/en/docs/clientexec/download-and-installation");

            if (!function_exists('simplexml_load_string'))
                throw new CE_Exception("Simple XML functions are not available<br>Please check PHP pre-requisites at https://support.netim.com/en/docs/clientexec/download-and-installation");

            // Curl request to get data
            $ch = curl_init();
            if($params["Use testing plateform"]==0)
                curl_setopt($ch, CURLOPT_URL,"https://www.netim.com/bin/pricing.php");
            else
                curl_setopt($ch, CURLOPT_URL,"https://oteweb.netim.com/bin/pricing.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('LOGIN' => $username,"PWD" => $password)));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $xmlstr = curl_exec($ch);
            curl_close ($ch);

            if(empty($xmlstr))
                throw new CE_Exception("[Netim plugin] Unable to fetch pricing information");

            if(preg_match("#error#",$xmlstr))
                throw new CE_Exception("[Netim plugin] Unable to fetch pricing information : $xmlstr");

            if(!preg_match("#<pricing>#",$xmlstr))
                throw new CE_Exception("[Netim plugin] Unable to fetch pricing information : Bad xml format");

            $xmlobj = simplexml_load_string($xmlstr);

            $tlds = [];
            foreach($xmlobj->domain as $element)
            {
                //Registration pricing
                if(isset($element->StandardFee4Registration))
                    $create=(float)$element->StandardFee4Registration;
                else if(isset($element->domainCreate))
                    $create=(float)$element->domainCreate;
                else
                    $create=null;
                $tlds[(string)$element->extension]['pricing']['register'] = $create;
                
                //Renew pricing
                if(isset($element->StandardFee4Renewal))
                    $renew=(float)$element->StandardFee4Renewal;
                else if(isset($element->domainRenew))
                    $renew=(float)$element->domainRenew;
                else
                    $renew=null;
                $tlds[(string)$element->extension]['pricing']['renew'] = $renew;

                //Transfer pricing
                if(isset($element->StandardFee4Transfer))
                    $transfer=(float)$element->StandardFee4Transfer;
                else if(isset($element->domainTransferIn))
                    $transfer=(float)$element->domainTransferIn;
                else
                    $transfer=null;			
                $tlds[(string)$element->extension]['pricing']['transfer'] = $transfer;
            }

            $import_tlds = [];
            if($import_tld_mode == "ALL")
            {
                foreach($tlds as $key=>$value)
                    $import_tlds[$key] = $value;
            }
            else if ($import_tld_mode == "LIST")
            {
                foreach($import_tld_list as $tld)
                {
                    if(array_key_exists($tld, $tlds))
                        $import_tlds[$tld] = $tlds[$tld];
                }
            }
            else if ($import_tld_mode == "EXISTING")
            {
                $existingTlds = Netim\Core\getExistingTld($this->db);
                foreach ($existingTlds as $tld)
                {
                    if(array_key_exists($tld, $tlds))
                        $import_tlds[$tld] = $tlds[$tld];
                }
             }

            $this->_logNetim(__FUNCTION__, "", "tlds", $import_tlds);
            return $import_tlds;
        }

        function fetchDomains($params)
        {
            // Call API queryDomainList
            try {
                $api = Netim\Core\getAPI($params);
                $domList = $api->queryDomainList("*");
            } catch (NetimAPIException $fault) {
                throw new CE_Exception("Failed to fetch domains at registrar");
            }
            finally {
                $this->_logAPIRequest(__FUNCTION__, "*", $api);
            }

            $total = count($domList);

            $data = array();
            foreach ($domList as $key => $value) {
                $tab = Netim\Core\SplitDomain($value->domain);
                $sld = $tab[0];
                $tld = $tab[1];
                $dateExp = $value->dateExpiration;
                $data[] =  array("id" => $key, "sld" => $sld, "tld" => $tld, "exp" => $dateExp);
                
            }

            $metaData = array();
            $metaData['total'] = $total;
            $metaData['next'] = 0;
            $metaData['start'] = 0;
            $metaData['end'] = $total;
            $metaData['numPerPage'] = $total;

            $result = array( $data, $metaData );
            $this->_logNetim(__FUNCTION__, "", "domains", $result);
            return $result;
        }

        function getTransferStatus($params)
        {
            return $info["Pending"];
            //throw new MethodNotImplemented('Method getTransferStatus has not been implemented yet.');
        }

        /**
        * Logs the API request
        *
        * @param $fn string The function were the call was done
        * @param $api object The Netim ClientAPI object
        * @return bool Result
        */
        private function _logAPIRequest($fn,$object,$api)
        {
            include (dirname(__FILE__). '/config.inc.php');

            if(!$netim_api_debug)
                return;

            $header = "[NETIM] Calling API from $fn";

            $result=empty($api->getLastError());
            if($result)
            {
                $response=$api->getLastResponse();
                $logLevel=4;
                $logLevel=1;
            }
            else
            {   
                $response=$api->getLastError();    
                $logLevel=1;
            }

            $arr = array(
                "object"=>$object,
                "function"=>$api->getLastRequestFunction(),
                "request"=>$api->getLastRequestParams(),
                "result"=>$response
            );

            $log=$header."\n".print_r($arr,true);
             CE_Lib::log($logLevel, $log);
        }

        function _logNetim($fn, $action, $domain, $message, $loglevel=1)
        {
            include (dirname(__FILE__). '/config.inc.php');

            if(!$netim_api_debug)
                return;
                
            $str="[NETIM] ";
            if(!empty($domain))
                $str.=$domain." ";
            $str.=$fn;
            if(!empty($action))
                $str.="(".$action.")";
            $str.=" >>> ";

            if(is_array($message) || is_object($message))
                $str.="\n".print_r($message,true);
            else
                $str.=$message;
            
            CE_Lib::log($loglevel, $str);
        }

        function _HandleException($fn, $action, $domain, $errormsg)
        {
            $this->_logNetim($fn, $action, $domain, $errormsg);
            throw new CE_Exception("[$domain] $errormsg");
        }
    }
?>