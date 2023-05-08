<?php
	// ----------------------------------------------------------------------------------------------
    // Module logging
	// ----------------------------------------------------------------------------------------------
    $netim_debug = false;
    $netim_api_debug = false;
    $netim_check_debug = false;

	// ----------------------------------------------------------------------------------------------
	// Local contact ID
	// ----------------------------------------------------------------------------------------------
	// This array defines which contact ID must be used for the local contact service. 
	// By default, NETIM's ID are set but you can define here your own contact if you can provide the service by yourself or any third party
	$localcontactID = array(
        "NETIM4BA"=>array("ba"),
        "NETIM4EE"=>array("ee","com.ee"),
        "NETIM4FR"=>array("fr","pm","re","tf","yf","yt"),
        "NETIM4HU"=>array("hu","co.hu","org.hu"),
        "NETIM4JP"=>array("jp"),
        "NETIM4MA"=>array("ma","co.ma"),
        "NETIM4SG"=>array("sg","com.sg")
    );
	
	// ----------------------------------------------------------------------------------------------
	// Trustee ID
	// ----------------------------------------------------------------------------------------------
	// This array defines which contact ID must be used for the trustee service. 
	// By default, NETIM's ID are set but you can define here your own contact if you can provide the service by yourself or any third party
	$trusteeID = array(
        "TRUST4AR"=>array("ar","com.ar",'net.ar','org.ar'),
        "TRUST4BA"=>array("ba"),
        "TRUST4BG"=>array("bg"),
        "TRUST4BR"=>array("com.br","net.br"),
        "TRUST4FR"=>array("fr","pm","re","tf","yf","yt"),
        "TRUST4HR"=>array("hr"),
        "TRUST4HU"=>array("hu","co.hu","org.hu"),
        "TRUST4IT"=>array("it"),
        "TRUST4KR"=>array("kr","co.kr","pe.kr","re.kr","seoul.kr","ne.kr","or.kr"),
        "TRUST4MD"=>array("md"),
        "TRUST4NO"=>array("no"),
        "TRUST4SK"=>array("sk"),
        "TRUST4MR"=>array("mr","org.mr","edu.mr","perso.mr"),
        "TRUST4MY"=>array("my","com.my","org.my","net.my"),
        "TRUST4VE"=>array("com.ve","net.ve","co.ve","org.ve","info.ve","web.ve")
    );

	// ----------------------------------------------------------------------------------------------
	// TLD importation mode
	// ----------------------------------------------------------------------------------------------
	// Specifies the mode of importation of tlds.
	// can be either "EXISTING", "LIST" or "ALL".
	// If "EXISTING is chosen, only the currently used TLDs will be updated
	// If "LIST" is chosen, only the TLDs in $import_tld_list will be imported
	// If "ALL" is chosen, all TLDs from netim will be imported (this is a lot !)
	$import_tld_mode = "EXISTING";
	$import_tld_list = array("");

?>