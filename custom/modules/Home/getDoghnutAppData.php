<?php
global $db, $current_user;
$from_date = date('Y-m-d H:i:s', strtotime($_REQUEST['fromDate'] . " 00:00:00" . ' +1 day'));
$to_date = date('Y-m-d H:i:s', strtotime($_REQUEST['toDate'] . " 00:00:00" . ' +1 day'));
$customer_name = $_REQUEST['customer_name'];
if($customer_name==''){
	$UserClause='';
}else{
	$UserClause=' AND id ="'.$customer_name.'"';
}
$whereClause = ' WHERE deleted="0" ';
//if from date is empty
if ($_REQUEST['fromDate'] == '') {
	$fromDateAndClause = "";
}
//if from date is not empty
else if ($_REQUEST['fromDate'] != '') {
	$fromDateAndClause = ' AND date_entered > "' . $from_date . '"';
}
//if to data is empty
if ($_REQUEST['toDate'] == '') {
	$toDateAndClause = "";
}
//if to date is not empty
else if ($_REQUEST['toDate'] != '') {
	$toDateAndClause = ' AND date_entered < "' . $to_date . '"';
}

// array initialize
$appDoghnutData = array();
//paid
$paidQuery='SELECT SUM(k_paid_amount) AS paidTotal FROM contacts '. $whereClause . $fromDateAndClause . $toDateAndClause . $UserClause .'';
$resultsPaidQuery=$db->query($paidQuery);
$rowResultsPaidQuery=$db->fetchByAssoc($resultsPaidQuery);
//unpaid
$unpaidQuery='SELECT SUM(k_unpaid_amount) AS unpaidTotal FROM contacts '. $whereClause . $fromDateAndClause . $toDateAndClause . $UserClause .'';
$resultsUnpaidQuery=$db->query($unpaidQuery);
$rowUnpaidQuery=$db->fetchByAssoc($resultsUnpaidQuery);
//credit
$creditQuery='SELECT SUM(k_credit_amount) AS creditTotal FROM contacts '. $whereClause . $fromDateAndClause . $toDateAndClause . $UserClause .'';
$resultCreditQuery=$db->query($creditQuery);
$rowCreditQuery=$db->fetchByAssoc($resultCreditQuery);
//refund
$refundQuery='SELECT SUM(k_refund_amount) AS refundTotal FROM contacts '. $whereClause . $fromDateAndClause . $toDateAndClause . $UserClause .'';
$resultRefundQuery=$db->query($refundQuery);
$rowRefundQuery=$db->fetchByAssoc($resultRefundQuery);

array_push($appDoghnutData, 
array(
"card1" => $rowResultsPaidQuery['paidTotal'], 
"card2" => $rowUnpaidQuery['unpaidTotal'], 
"card3" => $rowCreditQuery['creditTotal'], 
"card3" => $rowRefundQuery['refundTotal'], 
"card1name"=>'Paid',
"card2name"=>'UnPaid',
"card3name"=>'Credit',
"card4name"=>'Refund',
));
echo json_encode($appDoghnutData);
