<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
global $db, $current_user;
// $sugar_smarty = new Sugar_Smarty();
//delete where clause
$whereClause = "WHERE deleted=0";
//REQUEST all data
$from_date = $_REQUEST['from_date'] . " 00:00:00";
$to_date = $_REQUEST['to_date'] . " 00:00:00";

// for multiselect status
if(is_array($_REQUEST['status_name'])){
    $status = $_REQUEST['status_name'];
    $status = "'" . implode ( "', '", $status) . "'";
}
else{
    if($_REQUEST['status_name'] != ''){
        $status[0] = $_REQUEST['status_name'];
        $status = "'" . implode ( "', '", $status) . "'";
    }
}
//between Dates clause
if ($_REQUEST['from_date'] == '' && $_REQUEST['to_date'] == '') {
    // $betweenDateAndClause="AND date_entered BETWEEN'".$from_date."'AND'".$to_date."'";
    $dateClause = "";
}
//if from date is empty
if ($_REQUEST['from_date'] == '') {
    $fromDateAndClause = "";
}
//if from date is not empty
elseif ($_REQUEST['from_date'] != '') {
    $fromDateAndClause = "AND date_entered>'" . $from_date . "'";
}
//if to data is empty
if ($_REQUEST['to_date'] == '') {
    $toDateAndClause = "";
}
//if to date is not empty
elseif ($_REQUEST['to_date'] != '') {
    $toDateAndClause = "AND date_entered<'" . $to_date . "'";
}
//status
if ($status == '') {
    $statusClause = "";
} else if ($status != '') {
    $statusClause = "AND k_status in (".$status.")";
    // echo $statusClause;
}
//buyer_id
$buyers_id = $_REQUEST['buyers_name'];
if ($buyers_id == '') {
    $buyers_id_query = "";
} elseif ($buyers_id != '') {
    $buyers_id_query = "AND contacts_id='$buyers_id'";
}
//if nothing is selected
if ($buyers_id_query == '' && $from_date == '' && $to_date == '' && $status == '') {
    $select = "";
} else {
    $select = "SELECT * FROM";
}
//initilize empty array to push data in array and send it.
$data_arr = array();
$buyers_data = array();
//Dynamic Query working with where clause
$query = "$select k_bookings $whereClause $buyers_id_query $fromDateAndClause $toDateAndClause $dateClause $statusClause order by date_entered ASC";
// echo $query;
// die();
//execute query
$results = $db->query($query);
//fetch data from query with while loop for multipleRecords
while ($row = $db->fetchByAssoc($results)) {
    $buyers_last_name="";
    if($buyers_id!=""){
        $contactBean= BeanFactory::getBean('Contacts', $buyers_id);
        $buyers_idF=$buyers_id;
        $buyers_last_nameF= $contactBean->last_name;
    }else{
        $contacts_id=$row['contacts_id'];
        $contactBean=BeanFactory::getBean('Contacts', $contacts_id);
        $buyers_idF=$contacts_id;
        $buyers_last_nameF=$contactBean->last_name;
    }
    //for buyers
    $dateModified = $row['date_modified'];
    $dm = strtotime($dateModified);
    $dateEntered = $row['date_entered'];
    $em = strtotime($dateEntered);
    $name=$row['name'];
    $modifiedDate = date("Y-m-d h:i A", strtotime("+5 hours", $dm));
    $enteredDate = date("Y-m-d h:i A", strtotime("+5 hours", $em));
    //only store the data in array to send that is required
    $buyerData = array(
        'buyers_id' => $buyers_idF,
        'buyers_name' => $buyers_last_nameF,
        'caandidate_name' => $name,
        'id' => $row['id'],
        'status' => $row['k_status'],
        'total_amount' => $row['total'],
        'date_modified' => $modifiedDate,
        'date_entered' => $enteredDate,
    );
    array_push($buyers_data, $buyerData);
}
array_push($data_arr, array("Buyers" => $buyers_data));

echo json_encode($data_arr);
