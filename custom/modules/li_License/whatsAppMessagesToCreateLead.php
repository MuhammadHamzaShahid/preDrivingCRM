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
                $data = preg_replace("/[^a-zA-Z0-9\s]+/", "", html_entity_decode($text, ENT_QUOTES));
                var_dump($data);
                // die();
                if (str_starts_with($data, "textThank you for reaching out ")){
                    //Driving Test Request Details
                    //getting first name
                    $firstNameExplode=explode("n Full Name ", $data);
                    $firstNameExplode2=explode("n Driving License Number ", $firstNameExplode[1]);   
                    $firstNameFinal=$firstNameExplode2[0];
                    //getting  Driving License Number
                    $drivingLicenseNumberExplode=explode("n Driving License Number ", $data);
                    $drivingLicenseNumberExplode2=explode("n Email ", $drivingLicenseNumberExplode[1]);   
                    $drivingLicenseNumberFinal=$drivingLicenseNumberExplode2[0];
                    //getting Email
                    $emailExplode=explode("n Email ", $data);
                    $emailExplode2=explode("n Phone Number ", $emailExplode[1]);   
                    $emailExplodeFinal=$emailExplode2[0];
                    //getting Phone Number
                    $phoneNumberExplode=explode("n Phone Number ", $data);
                    $phoneNumberExplode2=explode("n Theory Number or Application Reference ", $phoneNumberExplode[1]);   
                    $phoneNumberExplodeFinal=$phoneNumberExplode2[0];
                    //getting Theory Number or Application Reference
                    $theoryNumberExplode=explode("n Theory Number or Application Reference ", $data);
                    $theoryNumberExplode2=explode("n Preferred Test Centre ", $theoryNumberExplode[1]);   
                    $theoryNumberExplodeFinal=$theoryNumberExplode2[0];
                    //getting Preferred Test Centre
                    $testCenterExplode=explode("n Preferred Test Centre ", $data);
                    $testCenterExplode2=explode("n Preferred Test Datemmddyyyy ", $testCenterExplode[1]);   
                    $testCenterExplodeFinal=$testCenterExplode2[0];
                    //getting  Preferred Test Date
                    $testDateExplode=explode("*Preferred Test Date(mm/dd/yyyy):* ", $text);
                    $testDateExplode2=explode("Thank you", $testDateExplode[1]);   
                    $testDateExplodeFinal=str_replace('\n\n', '', $testDateExplode2[0]);
                    //putting values in related sugarfields
                    $bean->k_full_name = $firstNameFinal;
                    // $bean->name = $drivingLicenseNumberFinal;
                    $bean->k_email = $emailExplodeFinal;
                    $bean->k_phone_no = $phoneNumberExplodeFinal;
                    $bean->theory = $theoryNumberExplodeFinal;
                    $bean->k_test_center = $testCenterExplodeFinal;
                    $bean->k_test_date = $testDateExplodeFinal;
                    echo'<pre>';
                    var_dump($firstNameFinal);
                    var_dump($emailExplodeFinal);
                    var_dump($phoneNumberExplodeFinal);
                    var_dump($testCenterExplodeFinal);
                    var_dump($testDateExplodeFinal);

                }else if (str_starts_with($data, "textFull Name ")) {
                    //Driving Lesson Request Details
                    //getting first name
                    $fullNameExplode=explode("textFull Name ", $data);
                    $fullNameExplode2=explode("n Transmission Manual or Auto ", $fullNameExplode[1]);   
                    $fullNameFinal=$fullNameExplode2[0];
                    //getting  Transmission Manual or Auto
                    $transmissionExplode=explode("n Transmission Manual or Auto ", $data);
                    $transmissionExplode2=explode("n Address ", $transmissionExplode[1]);   
                    $transmissionExplodeFinal=$transmissionExplode2[0];
                    //getting Address
                    $addressExplode=explode("n Address ", $data);
                    $addressExplode2=explode("n when do you want to start ", $addressExplode[1]);   
                    $addressExplodeFinal=$addressExplode2[0];
                    //getting when do you want to start
                    $whenToStartExplode=explode("n when do you want to start ", $data);
                    $whenToStartExplode2=explode("n Male or Female Instructor ", $whenToStartExplode[1]);   
                    $whenToStartExplodeFinal=$whenToStartExplode2[0];
                    //getting instructor male or female
                    $instructorExplode=explode("n Male or Female Instructor ", $data);
                    $instructorExplode2=explode("nnThank you for sharing your details", $instructorExplode[1]);   
                    $instructorExplodeFinal=$instructorExplode2[0];
                    //putting values in related sugarfields
                    $bean->k_full_name = $fullNameFinal;
                    $bean->k_transmission = $transmissionExplodeFinal;
                    $bean->k_address = $addressExplodeFinal;
                    $bean->k_when_to_start = $whenToStartExplodeFinal;
                    $bean->k_instructor = $instructorExplodeFinal;

                    echo'<pre>';
                    var_dump($fullNameFinal);
                    var_dump($transmissionExplodeFinal);
                    var_dump($addressExplodeFinal);
                    var_dump($whenToStartExplodeFinal);
                    var_dump($instructorExplodeFinal);
                    // die();
                }
            }
        }
    }
}