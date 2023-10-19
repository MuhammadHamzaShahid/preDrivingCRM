<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class whatsAppMessagesToCReateLeadClass{
        public function whatsAppMessagesToCReateLeadMethod(SugarBean $bean, $event, $arguments)
        {
            global $db;
            $whatsAppSms = $bean->k_whatsapp_test_details;
            if (empty($bean->fetched_row) && !isset($_REQUEST['massupdate']) && $bean->k_full_name='received_whatsapp_msg'){
                if(!empty($whatsAppSms)){
                    $data=explode(',',$whatsAppSms);
                    $text = $data[5].' '.$data[6].' '.$data[7];
                    $data = preg_replace("/[^a-zA-Z0-9\@]+/", "", html_entity_decode($text, ENT_QUOTES));
                    //getting first name
                    $firstNameExplode=explode("nFullName", $data);
                    $firstNameExplode2=explode("nDrivingLicenseNumber", $firstNameExplode[1]);   
                    $firstNameFinal=$firstNameExplode2[0];
                    //getting  Driving License Number
                    $drivingLicenseNumberExplode=explode("nDrivingLicenseNumber", $data);
                    $drivingLicenseNumberExplode2=explode("nEmail", $drivingLicenseNumberExplode[1]);   
                    $drivingLicenseNumberFinal=$drivingLicenseNumberExplode2[0];
                    //getting Email
                    $emailExplode=explode("nEmail", $data);
                    $emailExplode2=explode("nPhoneNumber", $emailExplode[1]);   
                    $emailExplodeFinal=$emailExplode2[0];
                    //getting Phone Number
                    $phoneNumberExplode=explode("nPhoneNumber", $data);
                    $phoneNumberExplode2=explode("nTheoryNumberorApplicationReference", $phoneNumberExplode[1]);   
                    $phoneNumberExplodeFinal=$phoneNumberExplode2[0];
                    //getting Theory Number or Application Reference
                    $theoryNumberExplode=explode("nTheoryNumberorApplicationReference", $data);
                    $theoryNumberExplode2=explode("nPreferredTestCentre", $theoryNumberExplode[1]);   
                    $theoryNumberExplodeFinal=$theoryNumberExplode2[0];
                    //getting Preferred Test Centre
                    $testCenterExplode=explode("nPreferredTestCentre", $data);
                    $testCenterExplode2=explode("nPreferredTestDatemmddyyyy", $testCenterExplode[1]);   
                    $testCenterExplodeFinal=$testCenterExplode2[0];
                    //getting  Preferred Test Date
                    $testDateExplode=explode("*Preferred Test Date(mm/dd/yyyy):* ", $text);
                    $testDateExplode2=explode("Thank you", $testDateExplode[1]);   
                    $testDateExplodeFinal=str_replace('\n\n', '', $testDateExplode2[0]);
                    //putting values in related sugarfields
                    $bean->k_full_name = $firstNameFinal;
                    $bean->name = $drivingLicenseNumberFinal;
                    $bean->k_email = $emailExplodeFinal;
                    $bean->k_phone_no = $phoneNumberExplodeFinal;
                    $bean->theory = $theoryNumberExplodeFinal;
                    $bean->k_test_center = $testCenterExplodeFinal;
                    $bean->k_test_date = $testDateExplodeFinal;
            }
        }
    }
}