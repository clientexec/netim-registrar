<?php
    define('NE_ADMIN', false);
    define('APPLICATION_PATH', realpath(__DIR__.'/../../..'));
  
    require_once APPLICATION_PATH.'/config.php';
    require_once APPLICATION_PATH.'/plugins/registrars/netim/lib/Core.php';

    $tld = [];

    //Connect CE database
    $db = new mysqli($hostname, $dbuser, $dbpass, $database);
    if (!$db) {
        die('Unable to connect CE database : ' . mysql_error());
    }

    //Choice as Get value
    if(!isset($_GET["tld"]) || $_GET["tld"]=="existing") {
        $query = "SELECT id, planname FROM `package` WHERE planid=2 AND pricing LIKE '%netim%'";
        $result = $db->query($query);
        foreach ($result as $row) {
			array_push($tld,$row['planname']);
		}
    }
    else
        $tld[]=$_GET["tld"];
  
    //Choice as Get value
    if(!isset($_GET["lang"]))
        $lang="en";
    else
        $lang=strtolower($_GET["lang"]);

    //Load translations
    require APPLICATION_PATH."/plugins/registrars/netim/additional_fields/$lang.inc.php";
    
    //Process the extensions
    foreach($tld as $t)
    {   
        $t='.'.$t;  
        
        //Load json configuration file
        $additional_fields_settings=Netim\Core\getAdditionalFields($t);

        //echo "tld = $t";

        if($additional_fields_settings) {
            
            $additional_fields=array();
            
            foreach($additional_fields_settings as $additional_field) {
                $key = $additional_field->Key;
                $label = $additional_field->Name;
                $type = $additional_field->Type;
                
                //ID
                $ea_id=$additional_field->Id;

                //Description
                $ea_description=$label;
                if(preg_match("#{{#",$label)) {
                    $ea_description= str_replace('{','',$ea_description);
                    $ea_description= str_replace('}','',$ea_description);
                    $ea_description= $$ea_description;
                }

                if(!empty($additional_field->Description) && !in_array($type,["checkbox"])) {
                    $ea_description2 = $additional_field->Description;
                    if(preg_match("#{{#",$ea_description2)){
                        $ea_description2= str_replace('{','',$ea_description2);
                        $ea_description2= str_replace('}','',$ea_description2);
                        $ea_description2= $$ea_description2;
                    }

                    $ea_description.=" (".strip_tags($ea_description2).")";
                }

                //Options
                $ea_options=[];
                switch($type) { 
                    case "checkbox":
                        $ea_options['']=['description'=>'','value'=>''];  // Empty value to validate a mandatory choice
                        if(!empty($additional_field->Description)) {
                            $ea_description2=$additional_field->Description;
                            if(preg_match("#{{#",$ea_description2)) {
                                $ea_description2= str_replace('{','',$ea_description2);
                                $ea_description2= str_replace('}','',$ea_description2);
                                $ea_description2= $$ea_description2;
                            }
                        }
                        $ea_options[$ea_description2]=['description'=>'','value'=>1];
                        break;

                    case "radio":
                    case "dropdown":
                        $ea_options['']=['description'=>'','value'=>''];  // Empty value to validate a mandatory choice
                        
                        foreach($additional_field->Items as $item) {
                            $ea_description2=$item->Description;
                            if(!empty($item->Description)) {
                                $ea_description2=$item->Description;
                                if(preg_match("#{{#",$ea_description2)) {
                                    $ea_description2= str_replace('{','',$ea_description2);
                                    $ea_description2= str_replace('}','',$ea_description2);
                                    $ea_description2= $$ea_description2;
                                }
                            }
                            $ea_options[$ea_description2]=['description'=>'','value'=>$ea_description2];
                            
                            /*
                            if(isset($item->Requires))
                                $ea_options[$ea_description2]=array_merge($ea_options[$ea_description2], ['requires'=>$item->Requires]);
                            */
                        }
                        
                        break;    
                    default:
                        continue 2;     
                }
                
                $additional_fields[$key]=['ID'=>$ea_id,'description'=>$ea_description,'options'=>$ea_options]; 
            } 
            
            $t=".eu";
            echo "<strong>$t</strong><br>";
            echo "<pre>";
            print_r($additional_fields);
            echo "</pre>";
 
            try{
                $t=substr($t, 1);
                $extra_attributes=base64_encode(serialize($additional_fields));
                $queryUpdateEA = "REPLACE INTO `tld_extra_attributes` (`tld`,`extra_attributes`) values ('".$t."','".$extra_attributes."')";
                $db->query($queryUpdateEA);
                echo "--> Update OK<br><br>";
            } 
            catch(mysqli_sql_exception $fault) {
                echo "--> Update FAILED: ".$fault->GetMessage()."<br><br>"; 
            } 
        }
    }    
?>