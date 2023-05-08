<?php

/** 
Database utilities for Netim_async
@created 2017-11-15
@lastUpdated 2023-04-20
@version 1.0.0
*/

namespace Netim\Database
{

    function createAsyncDb(\CE_MySQL $db)
    {
        try {
            $db->query('SELECT 1 from netim_async;');
        } catch (\Exception $exception) {
            $db->query("CREATE TABLE netim_async (
            ID_OPE INT(11) NOT NULL,
            DOMAINE VARCHAR(255) NOT NULL,
            CODE_OPE VARCHAR(50) NOT NULL,
            DATE_OPE DATETIME NOT NULL,
            PRIMARY KEY (ID_OPE)
            ) ENGINE = MyISAM ROW_FORMAT = DEFAULT;");
        }
    }

    function deleteAsyncDb(\CE_MySQL $db)
    {
        $db->query("DROP TABLE netim_async");
    }

    function getAsyncRequest(\CE_MySQL $db, string $code_ope, string $domain):bool
    {
        $domain = idn_to_ascii($domain,0,INTL_IDNA_VARIANT_UTS46);
        $res = $db->query("SELECT COUNT(*) FROM netim_async WHERE CODE_OPE = '$code_ope' AND DOMAINE = '$domain'");
        return boolval($res->fetch()[0]);
    }

    function addAsyncRequest(\CE_MySQL $db, $id_ope, string $code_ope, string $domain)
    {
        createAsyncDb($db);

        $domain = idn_to_ascii($domain,0,INTL_IDNA_VARIANT_UTS46);
        $date = new \DateTime();
        $dateTime = $date->format('Y-m-d H:i:s');
        
        $db->query("INSERT INTO netim_async VALUES ('$id_ope', '$domain', '$code_ope', '$dateTime')");
    }

    function removeAsyncRequest(\CE_MySQL $db, $id_ope)
    {
        $db->query("DELETE FROM netim_async WHERE ID_OPE = $id_ope");
    }

    function getAllAsyncRequests(\CE_MySQL $db):object
    {
        $res = $db->query("SELECT * FROM netim_async");
        return $res;
    }

}