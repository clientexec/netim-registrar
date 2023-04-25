<?php

/** 
Core utilities for ClientExec
@created 2017-11-15
@lastUpdated 2023-04-20
@version 1.0.0
*/

namespace Netim\Core
{
	use Exception;
	use Netim\APISoap;

	define ('NETIM_API_SRC', "CEXEC");
    define ("NETIM_PLUGIN_VERSION","2.0");

	function GetDomainID(\CE_MySQL $db, string $domain)
	{
		$query = "SELECT id FROM domains";

		$result = $db->query($query);
		while ($row = $result->fetch()) {
			$userPackage = new \UserPackage($row['id']);
			if($domain == $userPackage->getCustomField('Domain Name'))
			return $row['id'];
		}
	}

	function getExistingTld(\CE_MySQL $db)
	{
		$productGroupId = 2;
		
		$res = array();

        $query = "SELECT id, planname FROM `package` WHERE planid=? AND pricing LIKE '%netim%'";
        $result = $db->query($query, $productGroupId);
        while ($row = $result->fetch()) {
			array_push($res,$row['planname']);
		}
		return $res;
	}

	function getAdditionalFields($tld)
	{
		//$json=file_get_contents('plugins/registrars/netim/additional_fields/additional_fields.json');
		$json=file_get_contents(__DIR__.'/../additional_fields/additional_fields.json');
		
		$decoded_json=json_decode($json);
		if(isset($decoded_json->{$tld}))
			return $decoded_json->{$tld};
		else
			return false;
	}

	function updateNextDueDate(\CE_MySQL $db, int $domainId, string $newdate): bool
    {
		try
		{
			//Update related recurring fees, except the one of the package, as it is already been updated by its object.
			$queryUpdateRF = "UPDATE `recurringfee` SET `nextbilldate` = ? WHERE `appliestoid` = ?";
			$db->query($queryUpdateRF, $newdate, $domainId);

			//Update field nextbilldate in table domain_packageaddon_prices when updating the dates for addons.
			$queryUpdateDPAP = "UPDATE `domain_packageaddon_prices` SET `nextbilldate` = ? WHERE `domain_id` = ? ";
			$db->query($queryUpdateDPAP, $newdate, $domainId);

			return true;
		}
		catch (Exception $exception)
		{
			return false;
		}
    }

	function activateDomain(\CE_MySQL $db, int $domainId): bool
	{
		try
		{
			$query = "UPDATE domains SET status=1 WHERE id=$domainId";
			$db->query($query);
			return true;
		}
		catch (Exception $exception)
		{
			return false;
		}
	}

	function setDomainNotes(\CE_MySQL $db, int $domainId, $params):bool
	{
		//Not implemented in CE
	}

	function addEventAction(\CE_MySQL $db, int $id_ope, string $title, string $desc):bool
	{
		//Not implement in CE
	}

	function getAPI(array $params):APISoap
	{
		if (!class_exists('SoapClient'))
       		throw new \CE_Exception("Curl functions are not available<br>Please check PHP pre-requisites at https://support.netim.com/en/docs/clientexec/download-and-installation");

		$api = new APISoap($params['Login'], $params['Password'], $params["Use testing plateform"]==1);

		// Set version for logging purpose			
		$api->SetVersion(NETIM_API_SRC."=". \CE_Lib::getAppVersion() .",PLUGIN=".NETIM_PLUGIN_VERSION);

		//Increase synchronization value
		$api->sessionSetPreference("syncDelay",25);

		return $api;
	}

	/**
	* Returns the TLD of the given domain
	*
	* @param string $domain The domain to return the TLD from
	* @return string The TLD of the domain
	*/
	function getTld($domain)
	{
		$dng = new \DomainNameGateway();
        $splitDomain = $dng->splitDomain($domain);
        $sld = $splitDomain[0];
		$tld = $splitDomain[1];
		return $tld;
	}

	/**
	* Return the SLD and the TLD of the given domain
	*
	* @param string $domain The domain to split
	* @return array
	*/
	function SplitDomain($domain)
	{
		$dng = new \DomainNameGateway();
        $splitDomain = $dng->splitDomain($domain);
		return $splitDomain;
	}
}
?>