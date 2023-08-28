<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class bookingLogicHookClass
{
    public function bookingLogicHookMethod($bean, $event, $arguments)
    {
            // Check if the test detail field has been update/edit
            if (empty($bean->fetched_row) || $bean->k_test_detail != $bean->fetched_row['k_test_detail']){
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
                $bean->name = $candidateName;
                $bean->k_license_no = $drivingLicenseNumber;
                $bean->k_test_center = $testCenter;
                $bean->k_date_and_time = $dateTimeF;
                $bean->k_driving_test_ref_no = $drivingReferenceNumber;
                $bean->k_last_date =  $lastDateToCancelF;
                $bean->k_buyer_name = $buyerName;
                $bean->total = $totalAmount;
            }
        }
    
        // Check if the swap field has been set to 'yes'
        if ($bean->k_swap === 'Yes') {
            // Check if the old test detail is empty
            if (empty($bean->k_old_test_detail)) {
                $bean->k_old_test_detail = $bean->k_test_detail;
            } else {
                $oldTestDetail = $bean->k_old_test_detail;
                $oldTestDetail .= "\n" . $bean->k_test_detail;
                $bean->k_old_test_detail = $oldTestDetail;
            }

                 // Increment swap count
                $currentSwapCount = (int)$bean->k_swap_count; // Convert to integer
                $bean->k_swap_count = $currentSwapCount + 1;

                // Note swap date and save entries
                $swapDate = date('d/m/Y');
                $oldSwapDates = $bean->k_swap_date; // Retrieve existing swap dates

            if (empty($oldSwapDates)) {
                // No existing history, save the current value as the first entry
                $bean->k_swap_date = "Swap " . $bean->k_swap_count . ": " . $swapDate;
            } else {
                // Append the new value to the existing history
                $bean->k_swap_date = $oldSwapDates . "\n" . "Swap " . $bean->k_swap_count . ": " . $swapDate;
            }
            $bean->k_swap = 'No';
        }                      
    }
}