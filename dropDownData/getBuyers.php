<?php
if (!defined('sugarEntry'))
    define('sugarEntry', true);

chdir("..");
require_once('include/entryPoint.php');
require_once('include/utils.php');

global $db, $current_user, $sugar_config;
/*
            * Get lead history data
        */
$mysqli = mysqli_connect($sugar_config['dbconfig']['db_host_name'], $sugar_config['dbconfig']['db_user_name'], $sugar_config['dbconfig']['db_password'], $sugar_config['dbconfig']['db_name'], $sugar_config['dbconfig']['db_port']);
$res = $mysqli->multi_query("CALL  getBuyersData()");
$retData = array();
// $allCounselors = array();
// $allOffices = array();
// $allUsers = array();
// $allLeads = array();
// $allContacts = array();
// $allUsersDetailedData = array();
// $allSubAgents = array();
// $allBankAccounts = array();
// $allCurrencies = array();
// $allCounselorsAdmissionOfficers = array();
// $allAdmissionOfficers = array();
// $allSecurityGroups = array();
// $allRoles = array();
$allBuyers = array();
if ($res) {
    $results = 0;
    do {
        if ($result = $mysqli->store_result()) {
            //                    printf("<b>Result #%u</b>:<br/>", ++$results);
            $results++;
            if ($results == 1) {
                while ($row = $result->fetch_row()) {
                    array_push($allBuyers, $row);
                }
            }
            // if ($results == 2) {
            //     while ($row = $result->fetch_row()) {
            //         // $name=$row['first_name']." ".$row['last_name'];
            //         // array_push($allLeads, array("id"=>$row[0],"name"=>$name,));
            //         array_push($allLeads, $row);
            //     }
            // }
            // if ($results == 3) {
            //     while ($row = $result->fetch_row()) {
            //         array_push($allSecurityGroups, $row);
            //     }
            // }
            // if ($results == 4) {
            //     while ($row = $result->fetch_row()) {
            //         array_push($allRoles, $row);
            //     }
            // }
            // if ($results == 5) {
            //     while ($row = $result->fetch_row()) {
            //         array_push($allContacts, $row);
            //     }
            // }

            $result->close();
        }
    }while ($mysqli->more_results() && $mysqli->next_result()); 
    
    //}while($mysqli->more_results());
}
$mysqli->close();
$retData[] = array(
    // 'allCounselors' => $allCounselors,
    // 'allOffices' => $allOffices,
    // 'allUsers' => $allUsers,
    // 'allLeads' => $allLeads,
    // 'allContacts' => $allContacts,
    // 'allUsersDetailedData' => $allUsersDetailedData,
    // 'allSubAgents' => $allSubAgents,
    // 'allBankAccounts' => $allBankAccounts,
    // 'allCurrencies' => $allCurrencies,
    // 'allCounselorsAdmissionOfficers' => $allCounselorsAdmissionOfficers,
    // 'allAdmissionOfficers' => $allAdmissionOfficers,
    // 'allSecurityGroups' => $allSecurityGroups,
    // 'allRoles' => $allRoles,
    'allBuyers' => $allBuyers,
);

echo json_encode($retData);
