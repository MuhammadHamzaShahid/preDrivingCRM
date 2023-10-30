<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}
require_once('custom/modules/Home/Generic/dashboardFunctions.php');
/*
    *  include files global variables and other variables
*/
global $current_user,$db, $sugar_version, $sugar_config, $beanFiles,$theme;
$roleName='';

$sugar_smarty = new Sugar_Smarty();
/*
    * Checking User Role
*/
$roleBean=new ACLRole();
if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!=''){
	$roles = $roleBean->getUserRoleNames($_REQUEST['user_id']);
}else{
	$roles = $roleBean->getUserRoleNames($current_user->id);
}
if(!empty($roles))
    $roleName=$roles['0'];
if($current_user->is_admin==1 && $_REQUEST['user_id']=='')
    $roleName='Admin';

$sugar_smarty->assign('ROLE_NAME', $roleName);
$sugar_smarty->assign('ROLES', $roles);
/*
     * Showing default home tpl
*/
echo $sugar_smarty->fetch('custom/modules/Home/tpls/header.tpl');

if( !isset($_REQUEST['view']) ) {
    echo $sugar_smarty->fetch('custom/modules/Home/tpls/banner.tpl');

    if($roleName=='Admin' || $roleName=='Director'){
        // echo $roleName;
        $roleName='Admin';
        $roleBasedHomeTpl = "custom/modules/Home/tpls/home/" . $roleName . "Home.tpl";
        if (file_exists($roleBasedHomeTpl)) {
            echo $sugar_smarty->fetch($roleBasedHomeTpl);
        }
    }
    else if($roleName=='Manager'){
        $roleBasedHomeTpl = "custom/modules/Home/tpls/home/ManagerHome.tpl";
        if (file_exists($roleBasedHomeTpl)) {
            echo $sugar_smarty->fetch($roleBasedHomeTpl);
        }
    }
    else {
        // $newURL='https://www.predriving.co.uk/preDrivingCRM/index.php?module=Home&action=index';
        $newURL='index.php?module=Home&action=index';
        header('Location: '.$newURL);
    }
}
/*
    * Dashboard TPL fetch according to user
*/
if(isset($_REQUEST['view']) && $_REQUEST['view']=='bookingdashboard'){
    if($roleName=='Admin'){
        processBookingDashboard($sugar_smarty,$_REQUEST['user_id']);
    }
    $roleBasedDashboardTpl = "custom/modules/Home/tpls/dashboard/bookingDashboard.tpl";
    if (file_exists($roleBasedDashboardTpl))
        echo $sugar_smarty->fetch($roleBasedDashboardTpl);
}
function processBookingDashboard($sugar_smarty,$user_id=''){
    global $current_user,$sugar_config,$app_list_strings;
    $dashboardFunc=new dashboardFunctions();
    /*
        * Custom connection to get result sets
    */
    $mysqli = mysqli_connect($sugar_config['dbconfig']['db_host_name'], $sugar_config['dbconfig']['db_user_name'], $sugar_config['dbconfig']['db_password'], $sugar_config['dbconfig']['db_name'],$sugar_config['dbconfig']['db_port']);
    /* if this Function called from CEO dashboard then User ID will be passed else Current User id will be consider as UserID for Dashboard Data */

    if($user_id){
        $res = $mysqli->multi_query( "CALL  GetBookingDashboardData('".$user_id."')" );
    }
    else{
        $res = $mysqli->multi_query( "CALL  GetBookingDashboardData('".$current_user->id."')" );
    }





    $allBookingsGraphArr = array();
    $allPaymentsGraphArr = array();
    $allPaymentsByCustomerGraphArr = array();

    if( $res ) {
        $results = 0;
        do {
            if ($result = $mysqli->store_result()) {
                $results++;
                // All Bookings
                if ($results == 1){
                    while( $row = $result->fetch_row()) {
                        $sugar_smarty->assign('TOTALBOOKINGCOUNT', $row['0']);
                        $sugar_smarty->assign('DIRECTBOOKINGCOUNT', $row['1']);
                        $sugar_smarty->assign('CONFIRMEDBOOKINGCOUNT', $row['2']);
                        $sugar_smarty->assign('ONHOLDBOOKINGCOUNT', $row['3']);
                        $sugar_smarty->assign('CANCELLEDBOOKINGCOUNT', $row['4']);
                        $sugar_smarty->assign('AVAILABLEBOOKINGCOUNT', $row['5']);
                        $allBookingsGraphArr=array(
                            'totalBookingCount' => $row['0'],
                            'directBookingCount' => $row['1'],
                            'confirmedBookingCount' => $row['2'],
                            'onholdBookingCount' => $row['3'],
                            'cancelledBookingCount' => $row['4'],
                            'availableBookingCount' => $row['5'],
                        );
                    }
                    $allBookingsGraphArrJSON =  json_encode($allBookingsGraphArr);
                    $sugar_smarty->assign('ALLBOOKINGSGRAPHARR', $allBookingsGraphArrJSON);
                }
                //Payments
                if ($results == 2){
                    while( $row = $result->fetch_row()) {
                        $sugar_smarty->assign('ALLPAYMENTCOUNT', $row['0']);
                        $sugar_smarty->assign('UNPAIDCOUNT', $row['1']);
                        $sugar_smarty->assign('PAIDCOUNT', $row['2']);
                        $sugar_smarty->assign('CREDITCOUNT', $row['3']);
                        $sugar_smarty->assign('REFUNDCOUNT', $row['4']);
                        $allPaymentsGraphArr=array(
                            'allPaymentCount' => $row['0'],
                            'unpaidCount' => $row['1'],
                            'paidCount' => $row['2'],
                            'creditCount' => $row['3'],
                            'refundCount' => $row['4'],
                        );
                    }
                    $allPaymentsGraphArrJSON =  json_encode($allPaymentsGraphArr);
                    $sugar_smarty->assign('ALLPAYMENTSGRAPHARR', $allPaymentsGraphArrJSON);
                }
                //all payments by customer
                if ($results == 3){
                    while( $row = $result->fetch_row()) {
                        if(!empty($customerName))
                            $customerName=$customerName.','.$row['0'];
                        else
                            $customerName=$row['0'];

                        if(empty($row['2'])){
                            $row['2']='00';
                        }

                        if(!empty($paidAmount))
                            $paidAmount=$paidAmount.','.$row['2'];
                        else
                            $paidAmount=$row['2'];

                        if(!empty($userId))
                            $userId=$userId.','.$row['1'];
                        else
                            $userId=$row['1'];
                    }
                    $allPaymentsByCustomerGraphArr=array(
                        'customerName' => $customerName,
                        'userId' => $userId,
                        'paidAmount' => $paidAmount,
                    );
                    $allPaymentsByCustomerGraphArrJSON =  json_encode($allPaymentsByCustomerGraphArr);
                    $sugar_smarty->assign('ALLPAYMENTSBYCUSTOMERGRAPHARRJSON', $allPaymentsByCustomerGraphArrJSON);
                }
                //rent properties of agents
                if ($results == 5){
                    while( $row = $result->fetch_row()) {
                        if(!empty($agentNameRent))
                            $agentNameRent=$agentNameRent.','.$row['0'];
                        else
                            $agentNameRent=$row['0'];

                        if(!empty($rent))
                            $rent=$rent.','.$row['2'];
                        else
                            $rent=$row['2'];

                        if(!empty($userIdRent))
                            $userIdRent=$userIdRent.','.$row['1'];
                        else
                            $userIdRent=$row['1'];
                    }
                    $agentsRentBookingsGraphArr=array(
                        'agentName' => $agentNameRent,
                        'userId' => $userIdRent,
                        'rent' => $rent,
                    );
                    $agentsRentBookingsGraphArrJSON =  json_encode($agentsRentBookingsGraphArr);
                    $sugar_smarty->assign('AGENTSRENTBookingsGRAPHARR', $agentsRentBookingsGraphArrJSON);
                }
                //buy properties of agents
                if ($results == 6){
                    while( $row = $result->fetch_row()) {
                        if(!empty($agentNameSecondary))
                            $agentNameSecondary=$agentNameSecondary.','.$row['0'];
                        else
                            $agentNameSecondary=$row['0'];

                        if(!empty($secondary))
                            $secondary=$secondary.','.$row['2'];
                        else
                            $secondary=$row['2'];

                        if(!empty($userIdSecondary))
                            $userIdSecondary=$userIdSecondary.','.$row['1'];
                        else
                            $userIdSecondary=$row['1'];
                    }
                    $agentsSecondaryBookingsGraphArr=array(
                        'agentName' => $agentNameSecondary,
                        'userId' => $userIdSecondary,
                        'secondary' => $secondary,
                    );
                    $agentsSecondaryBookingsGraphArrJSON =  json_encode($agentsSecondaryBookingsGraphArr);
                    $sugar_smarty->assign('AGENTSSECONDARYBookingsGRAPHARR', $agentsSecondaryBookingsGraphArrJSON);
                }
                //all Bookings 2022
                if ($results == 7){
                    while( $row = $result->fetch_row()) {
                        $sugar_smarty->assign('TOTALLISTINGCOUNT2022', $row['0']);
                        $sugar_smarty->assign('RENTCOUNT2022', $row['1']);
                        $sugar_smarty->assign('SECONDARYCOUNT2022', $row['2']);
                        $sugar_smarty->assign('OFFPLANCOUNT2022', $row['3']);
                        $allBookingsGraphArr2022=array(
                            'totalBookings' => $row['0'],
                            'rentListing' => $row['1'],
                            'secondaryListing' => $row['2'],
                            'offPlanListing' => $row['3'],
                        );
                    }
                    $allBookingsGraphArr2022JSON =  json_encode($allBookingsGraphArr2022);
                    $sugar_smarty->assign('ALLBookingsGRAPHARR2022', $allBookingsGraphArr2022JSON);
                }
                //Live Bookings 2022
                if ($results == 8){
                    while( $row = $result->fetch_row()) {
                        $sugar_smarty->assign('TOTALLIVELISTINGCOUNT2022', $row['0']);
                        $sugar_smarty->assign('RENTLIVECOUNT2022', $row['1']);
                        $sugar_smarty->assign('SECONDARYLIVECOUNT2022', $row['2']);
                        $sugar_smarty->assign('OFFPLANLIVECOUNT2022', $row['3']);
                        $allLiveBookingsGraphArr2022=array(
                            'totalLiveBookings' => $row['0'],
                            'rentLiveListing' => $row['1'],
                            'secondaryLiveListing' => $row['2'],
                            'offPlanLiveListing' => $row['3'],
                        );
                    }
                    $allLiveBookingsGraphArr2022JSON =  json_encode($allLiveBookingsGraphArr2022);
                    $sugar_smarty->assign('ALLLIVEBookingsGRAPHARR2022', $allLiveBookingsGraphArr2022JSON);
                }
                //created vs live Bookings 2022
                if ($results == 9){
                    while( $row = $result->fetch_row()) {
                        if(!empty($assignedBookings2022))
                            $assignedBookings2022=$assignedBookings2022.','.$row['1'];
                        else
                            $assignedBookings2022=$row['1'];

                        if(!empty($convertedBookings2022))
                            $convertedBookings2022=$convertedBookings2022.','.$row['2'];
                        else
                            $convertedBookings2022=$row['2'];

                        if(!empty($listingMonths2022))
                            $listingMonths2022=$listingMonths2022.','.$row['0'];
                        else
                            $listingMonths2022=$row['0'];
                    }
                    $allBookingsLiveMonthlyGraphArr2022=array(
                        'listingMonths' => $listingMonths2022,
                        'assignedBookings' => $assignedBookings2022,
                        'convertedBookings' => $convertedBookings2022,
                    );
                    $allBookingsLiveMonthlyGraphArr2022JSON =  json_encode($allBookingsLiveMonthlyGraphArr2022);
                    $sugar_smarty->assign('ALLBookingsLIVEMONTHLYGRAPHARR2022', $allBookingsLiveMonthlyGraphArr2022JSON);
                }
                //off plan properties of agents 20222
                if ($results == 10){
                    while( $row = $result->fetch_row()) {
                        if(!empty($agentName2022))
                            $agentName2022=$agentName2022.','.$row['0'];
                        else
                            $agentName2022=$row['0'];

                        if(!empty($offplan2022))
                            $offplan2022=$offplan2022.','.$row['2'];
                        else
                            $offplan2022=$row['2'];

                        if(!empty($userId2022))
                            $userId2022=$userId2022.','.$row['1'];
                        else
                            $userId2022=$row['1'];
                    }
                    $agentsOffPlanBookingsGraphArr2022=array(
                        'agentName' => $agentName2022,
                        'userId' => $userId2022,
                        'offplan' => $offplan2022,
                    );
                    $agentsOffPlanBookingsGraphArr2022JSON =  json_encode($agentsOffPlanBookingsGraphArr2022);
                    $sugar_smarty->assign('AGENTSOFFPLANBookingsGRAPHARR2022', $agentsOffPlanBookingsGraphArr2022JSON);
                }
                //rent properties of agents
                if ($results == 11){
                    while( $row = $result->fetch_row()) {
                        if(!empty($agentNameRent2022))
                            $agentNameRent2022=$agentNameRent2022.','.$row['0'];
                        else
                            $agentNameRent2022=$row['0'];

                        if(!empty($rent2022))
                            $rent2022=$rent2022.','.$row['2'];
                        else
                            $rent2022=$row['2'];

                        if(!empty($userIdRent2022))
                            $userIdRent2022=$userIdRent2022.','.$row['1'];
                        else
                            $userIdRent2022=$row['1'];
                    }
                    $agentsRentBookingsGraphArr2022=array(
                        'agentName' => $agentNameRent2022,
                        'userId' => $userIdRent2022,
                        'rent' => $rent2022,
                    );
                    $agentsRentBookingsGraphArr2022JSON =  json_encode($agentsRentBookingsGraphArr2022);
                    $sugar_smarty->assign('AGENTSRENTBookingsGRAPHARR2022', $agentsRentBookingsGraphArr2022JSON);
                }
                //buy properties of agents 2022
                if ($results == 12){
                    while( $row = $result->fetch_row()) {
                        if(!empty($agentNameSecondary2022))
                            $agentNameSecondary2022=$agentNameSecondary2022.','.$row['0'];
                        else
                            $agentNameSecondary2022=$row['0'];

                        if(!empty($secondary2022))
                            $secondary2022=$secondary2022.','.$row['2'];
                        else
                            $secondary2022=$row['2'];

                        if(!empty($userIdSecondary2022))
                            $userIdSecondary2022=$userIdSecondary2022.','.$row['1'];
                        else
                            $userIdSecondary2022=$row['1'];
                    }
                    $agentsSecondaryBookingsGraphArr2022=array(
                        'agentName' => $agentNameSecondary2022,
                        'userId' => $userIdSecondary2022,
                        'secondary' => $secondary2022,
                    );
                    $agentsSecondaryBookingsGraphArr2022JSON =  json_encode($agentsSecondaryBookingsGraphArr2022);
                    $sugar_smarty->assign('AGENTSSECONDARYBookingsGRAPHARR2022', $agentsSecondaryBookingsGraphArr2022JSON);
                }
                //2023
                //all Bookings 2023
                if ($results == 13){
                    while( $row = $result->fetch_row()) {
                        $sugar_smarty->assign('TOTALLISTINGCOUNT2023', $row['0']);
                        $sugar_smarty->assign('RENTCOUNT2023', $row['1']);
                        $sugar_smarty->assign('SECONDARYCOUNT2023', $row['2']);
                        $sugar_smarty->assign('OFFPLANCOUNT2023', $row['3']);
                        $allBookingsGraphArr2023=array(
                            'totalBookings' => $row['0'],
                            'rentListing' => $row['1'],
                            'secondaryListing' => $row['2'],
                            'offPlanListing' => $row['3'],
                        );
                    }
                    $allBookingsGraphArr2023JSON =  json_encode($allBookingsGraphArr2023);
                    $sugar_smarty->assign('ALLBookingsGRAPHARR2023', $allBookingsGraphArr2023JSON);
                }
                //Live Bookings 2023
                if ($results == 14){
                    while( $row = $result->fetch_row()) {
                        $sugar_smarty->assign('TOTALLIVELISTINGCOUNT2023', $row['0']);
                        $sugar_smarty->assign('RENTLIVECOUNT2023', $row['1']);
                        $sugar_smarty->assign('SECONDARYLIVECOUNT2023', $row['2']);
                        $sugar_smarty->assign('OFFPLANLIVECOUNT2023', $row['3']);
                        $allLiveBookingsGraphArr2023=array(
                            'totalLiveBookings' => $row['0'],
                            'rentLiveListing' => $row['1'],
                            'secondaryLiveListing' => $row['2'],
                            'offPlanLiveListing' => $row['3'],
                        );
                    }
                    $allLiveBookingsGraphArr2023JSON =  json_encode($allLiveBookingsGraphArr2023);
                    $sugar_smarty->assign('ALLLIVEBookingsGRAPHARR2023', $allLiveBookingsGraphArr2023JSON);
                }
                //created vs live Bookings 2023
                if ($results == 15){
                    while( $row = $result->fetch_row()) {
                        if(!empty($assignedBookings2023))
                            $assignedBookings2023=$assignedBookings2023.','.$row['1'];
                        else
                            $assignedBookings2023=$row['1'];

                        if(!empty($convertedBookings2023))
                            $convertedBookings2023=$convertedBookings2023.','.$row['2'];
                        else
                            $convertedBookings2023=$row['2'];

                        if(!empty($listingMonths2023))
                            $listingMonths2023=$listingMonths2023.','.$row['0'];
                        else
                            $listingMonths2023=$row['0'];
                    }
                    $allBookingsLiveMonthlyGraphArr2023=array(
                        'listingMonths' => $listingMonths2023,
                        'assignedBookings' => $assignedBookings2023,
                        'convertedBookings' => $convertedBookings2023,
                    );
                    $allBookingsLiveMonthlyGraphArr2023JSON =  json_encode($allBookingsLiveMonthlyGraphArr2023);
                    $sugar_smarty->assign('ALLBookingsLIVEMONTHLYGRAPHARR2023', $allBookingsLiveMonthlyGraphArr2023JSON);
                }
                //off plan properties of agents 20232
                if ($results == 16){
                    while( $row = $result->fetch_row()) {
                        if(!empty($agentName2023))
                            $agentName2023=$agentName2023.','.$row['0'];
                        else
                            $agentName2023=$row['0'];

                        if(!empty($offplan2023))
                            $offplan2023=$offplan2023.','.$row['2'];
                        else
                            $offplan2023=$row['2'];

                        if(!empty($userId2023))
                            $userId2023=$userId2023.','.$row['1'];
                        else
                            $userId2023=$row['1'];
                    }
                    $agentsOffPlanBookingsGraphArr2023=array(
                        'agentName' => $agentName2023,
                        'userId' => $userId2023,
                        'offplan' => $offplan2023,
                    );
                    $agentsOffPlanBookingsGraphArr2023JSON =  json_encode($agentsOffPlanBookingsGraphArr2023);
                    $sugar_smarty->assign('AGENTSOFFPLANBookingsGRAPHARR2023', $agentsOffPlanBookingsGraphArr2023JSON);
                }
                //rent properties of agents
                if ($results == 17){
                    while( $row = $result->fetch_row()) {
                        if(!empty($agentNameRent2023))
                            $agentNameRent2023=$agentNameRent2023.','.$row['0'];
                        else
                            $agentNameRent2023=$row['0'];

                        if(!empty($rent2023))
                            $rent2023=$rent2023.','.$row['2'];
                        else
                            $rent2023=$row['2'];

                        if(!empty($userIdRent2023))
                            $userIdRent2023=$userIdRent2023.','.$row['1'];
                        else
                            $userIdRent2023=$row['1'];
                    }
                    $agentsRentBookingsGraphArr2023=array(
                        'agentName' => $agentNameRent2023,
                        'userId' => $userIdRent2023,
                        'rent' => $rent2023,
                    );
                    $agentsRentBookingsGraphArr2023JSON =  json_encode($agentsRentBookingsGraphArr2023);
                    $sugar_smarty->assign('AGENTSRENTBookingsGRAPHARR2023', $agentsRentBookingsGraphArr2023JSON);
                }
                //buy properties of agents 2023
                if ($results == 18){
                    while( $row = $result->fetch_row()) {
                        if(!empty($agentNameSecondary2023))
                            $agentNameSecondary2023=$agentNameSecondary2023.','.$row['0'];
                        else
                            $agentNameSecondary2023=$row['0'];

                        if(!empty($secondary2023))
                            $secondary2023=$secondary2023.','.$row['2'];
                        else
                            $secondary2023=$row['2'];

                        if(!empty($userIdSecondary2023))
                            $userIdSecondary2023=$userIdSecondary2023.','.$row['1'];
                        else
                            $userIdSecondary2023=$row['1'];
                    }
                    $agentsSecondaryBookingsGraphArr2023=array(
                        'agentName' => $agentNameSecondary2023,
                        'userId' => $userIdSecondary2023,
                        'secondary' => $secondary2023,
                    );
                    $agentsSecondaryBookingsGraphArr2023JSON =  json_encode($agentsSecondaryBookingsGraphArr2023);
                    $sugar_smarty->assign('AGENTSSECONDARYBookingsGRAPHARR2023', $agentsSecondaryBookingsGraphArr2023JSON);
                }
                $result->close();
            }
        } while( $mysqli->next_result() );
    }

    $mysqli->close();

    // $tasks=$dashboardFunc->processTasks($tasksArr);
    // $sugar_smarty->assign('TASKS', $tasks);
    // $leads=$dashboardFunc->processLeads($leadsArr);
    // $sugar_smarty->assign('LEADS', $leads);
    // $contacts=$dashboardFunc->processContacts($contactsArr);
    // $sugar_smarty->assign('CONTACTS', $contacts);
    // $sugar_smarty->assign('OPPBYSALESSTAGE', $OppBySalesStage);
    // $sugar_smarty->assign('INVOICES', $Invoices);

    // $app_status_list = $app_list_strings['application_status_list'];
    // $sales_stage_list = $app_list_strings['sales_stage_dom'];
    // $sugar_smarty->assign('APP_STATUS_LIST', $app_status_list);
    // $sugar_smarty->assign('SALES_STAGE_LIST', $sales_stage_list);
}