<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class bookingLogicHookClass
{
    public function bookingLogicHookMethod($bean, $event, $arguments)
    {
            // Check if the test detail field has been update/edit
        if (empty($bean->fetched_row)) {
            // Extracting the data from the custom test detail field
            $data =  preg_split('/\t+/', $bean->k_test_detail);
            $fieldCount = count($data); 
           
            if ($fieldCount >= 8) {
                $candidateName = trim($data[0]);
                // $drivingLicenseNumber = trim($data[1]);
                $testCenter = trim($data[5]);
                $dateTime = trim($data[4]);
                $drivingReferenceNumber = trim($data[1]);
                $lastDateToCancel = trim($data[6]);
                $buyerName = trim($data[7]);
                $totalAmount = trim($data[8]);
                $lastDateToCancelF= date('Y-m-d',strtotime($lastDateToCancel)); 
                $dateTimeF= date('Y-m-d H:i:s',strtotime($dateTime)); 

            // Putting the trimmed values in their respective fields
                $bean->k_candidate_name = $candidateName;
                $bean->k_license_no = $drivingLicenseNumber;
                $bean->k_test_center = $testCenter;
                $bean->k_date_and_time = $dateTimeF;
                $bean->k_driving_test_ref_no = $drivingReferenceNumber;
                $bean->k_last_date =  $lastDateToCancelF;
                $bean->k_buyer_name = $buyerName;
                $bean->total = $totalAmount;
            }
        }
    }
}
