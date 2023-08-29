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
                $totalAmount = str_replace('£', '', trim($data[8]));
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
                $bean->test_fee = $totalAmount;
            }
        }
    
        // Check if the swap field has been set to 'yes'
        if ($bean->k_swap === 'Yes') {
                $currentTestDetail = $bean->k_test_detail;
                $currentAccount = $bean->accounts_id;
                $currentLicense = $bean->li_license_id;
                $currentCustomerName = $bean->contacts_id;
                
                //Check if the test detail, account, license, and customer name fields are the same
            if ($currentTestDetail != $bean->fetched_row['k_test_detail'] ||
                $currentAccount != $bean->fetched_row['accounts_id'] ||
                $currentLicense != $bean->fetched_row['li_license_id'] ||
                $currentCustomerName != $bean->fetched_row['contacts_id']) {
           
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

                // Increment swap fee by $20 for every swap
                $currentSwapFee = $bean->k_swap_fee; // ignore '$' sign and convert to float while increment
                $newSwapFee = (float)$currentSwapFee + 20;
                $bean->k_swap_fee = $newSwapFee;

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
                
                // Create a new transaction record in the Transaction module
                $transactionBean = BeanFactory::newBean('k_transactions');
                $transactionBean->k_transaction_amount = '20';
                $transactionBean->k_bookings_id = $bean->id;
                $transactionBean->save();
            }
        }          
            $bean->k_swap = 'No';
            $bean->total= (float)$bean->commission + (float)$bean->k_swap_fee + (float)$bean->test_fee;
            if($bean->contacts_id!=''){
                // Query to get the current count of bookings transactions
                $query = "SELECT SUM(total) AS sum FROM k_Bookings where contacts_id='$bean->contacts_id' AND k_transaction_type='Pending' AND deleted='0'";
                // Execute the query and retrieve the count of transactions
                $result = $GLOBALS['db']->query($query);
                $row = $GLOBALS['db']->fetchByAssoc($result);
                if(empty($bean->fetched_row)){
                    $sum = $row['sum'] + $bean->total;
                }else{
                    $sum = $row['sum'];
                }
                $contactsBean = BeanFactory::getBean('Contacts',$bean->contacts_id);
                $contactsBean->amount=$sum;
                $contactsBean->save();
            }
    }
}
