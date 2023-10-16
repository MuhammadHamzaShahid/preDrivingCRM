<?php
require_once ('custom/modules/k_Bookings/smtp/PHPMailerAutoload.php');
require 'vendor/autoload.php';

function smtp_mailer($to, $subject, $msg)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = "smtp.hostinger.com";
        $mail->Port = 465;
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        // $mail->SMTPDebug = 2;
        $mail->Username = "sales@predriving.co.uk";
        $mail->Password = "Sales@2023";
        $mail->setfrom("sales@predriving.co.uk");
        $mail->Subject = $subject;
        $mail->Body = $msg;
        $mail->AddAddress($to);
        $mail->SMTPOptions = array('ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        ));
        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        } else {
            return 'Sent';
        }
    }  
class sendBookingConfirmationEmail {
    public function sendBookingEmail($bean, $event, $arguments)
    {
        global $current_user,$db;
        if($bean->fetched_row['k_email']!=$bean->k_email){
            $emailAddress = $bean->k_email;
            if($emailAddress!=''){
                $name =$bean->k_buyer_name;
                $dateAndTime = $bean->k_date_and_time;
                $dateTimeF= date('D d M Y H:i',strtotime($dateAndTime)); 
                $lastDate = $bean->k_last_date;
                $lastDateF= date('D d M Y',strtotime($lastDate)); 
                $testCenter = $bean->k_test_center;
                $refNumber = $bean->k_driving_test_ref_no;
                $paylink = $bean->stripe_checkout_url;
                $message = "Dear <u> <strong>$name</strong>,</u><br><br>";
                $message .= "Your Car driving test is booked for <u> <strong>$dateTimeF</strong> </u> at <u> <strong>$testCenter</strong> </u> driving test centre.<br><br>";
                $message .= "<span style='color: red;'> <h2> You must bring: </h2></span>";
                $message .= "<ol> • your UK driving licence.</ol>\n";
                $message .= "(if you have an old style paper licence, you must bring it along with a valid passport)\n";
                $message .= "<ol> • a car - most people use their driving instructor's, but you can <a href='https://www.gov.uk/driving-test/using-your-own-car'> use your own </a> if it meets the rules </ol>\n\n";
                $message .= "<h4> Your test will be cancelled and you'll have to pay again if you don't bring the right things or you arrive late.</h4>\n\n";
                $message .= "<h3> How the test works: </h3>";
                $message .= "You can find out <a href='https://www.gov.uk/driving-test/what-to-take'> how the driving test works </a> or <a href='https://www.safedrivingforlife.info/'> read tips on how to prepare. </a><br>";
                $message .= "<h3>Changing your test date:</h3>";
                $message .= "Your test appointment is within the short notice cancellation period and, as advised, you'll lose your fee if you wish to change or cancel the date.<br><br>";
                $message .= "To <a href='https://www.gov.uk/change-driving-test'> check, change or cancel this appointment</a>, you'll need your driving test reference number:<u> <strong>$refNumber</strong>. </u><br><br>";
                $message .= "You can change or cancel your test up until <strong>$lastDateF</strong>. You'll lose your fee if you make any changes after then.<br><br>";
                $message .= "If you have queries regarding this appointment, email us quoting the driving test reference number above with your driving licence number or theory test number.<br><br>";
                $message .= "Please login to the DVSA website and update your detail. It is your responsibility to make sure your update the candidate details and you will be notified by the DVSA if there are changes made to your booking.<br><br>";
                $message .= "customerservices@dvsa.gov.uk<br><br>";
                $message .= "<h3> Bad weather on the day of your test:</h3>";
                $message .= "Call Chingford Test Centre, if there's fog, ice, snow, flooding, or high winds on the day of your test. You'll be told whether your test can go ahead or not.<br><br>";
                $message .= "We wish you success with your test.<br><br>";
                $message .= "If you have booked a test on behalf of someone else, you must draw their attention to this information about their data and privacy: <a href='https://www.gov.uk/government/publications/dvsa-privacy-notices/book-and-manage-your-driving-test-privacy-notice'> Book and manage your driving test: privacy notice - GOV.UK(https://www.gov.uk) </a><br><br>";
                $message .= "Driver and Vehicle Standards Agency<br>";
                $message .= "Booking Payment Link: $paylink ";
                smtp_mailer($emailAddress, 'Confirmation Email', $message);
            }
        }elseif(!empty($bean->fetched_row) && ($bean->fetched_row['k_test_detail']!=$bean->k_test_detail || $bean->fetched_row['total']!=$bean->total)){
            $emailAddress = $bean->k_email;
            if($emailAddress!=''){
                $name =$bean->k_buyer_name;
                $dateAndTime = $bean->k_date_and_time;
                $dateTimeF= date('D d M Y H:i',strtotime($dateAndTime)); 
                $lastDate = $bean->k_last_date;
                $lastDateF= date('D d M Y',strtotime($lastDate)); 
                $testCenter = $bean->k_test_center;
                $refNumber = $bean->k_driving_test_ref_no;
                $paylink = $bean->stripe_checkout_url;
                $message = "Dear <u> <strong>$name</strong>,</u><br><br>";
                $message .= "Your Car driving test is booked for <u> <strong>$dateTimeF</strong> </u> at <u> <strong>$testCenter</strong> </u> driving test centre.<br><br>";
                $message .= "<span style='color: red;'> <h2> You must bring: </h2></span>";
                $message .= "<ol> • your UK driving licence.</ol>\n";
                $message .= "(if you have an old style paper licence, you must bring it along with a valid passport)\n";
                $message .= "<ol> • a car - most people use their driving instructor's, but you can <a href='https://www.gov.uk/driving-test/using-your-own-car'> use your own </a> if it meets the rules </ol>\n\n";
                $message .= "<h4> Your test will be cancelled and you'll have to pay again if you don't bring the right things or you arrive late.</h4>\n\n";
                $message .= "<h3> How the test works: </h3>";
                $message .= "You can find out <a href='https://www.gov.uk/driving-test/what-to-take'> how the driving test works </a> or <a href='https://www.safedrivingforlife.info/'> read tips on how to prepare. </a><br>";
                $message .= "<h3>Changing your test date:</h3>";
                $message .= "Your test appointment is within the short notice cancellation period and, as advised, you'll lose your fee if you wish to change or cancel the date.<br><br>";
                $message .= "To <a href='https://www.gov.uk/change-driving-test'> check, change or cancel this appointment</a>, you'll need your driving test reference number:<u> <strong>$refNumber</strong>. </u><br><br>";
                $message .= "You can change or cancel your test up until <strong>$lastDateF</strong>. You'll lose your fee if you make any changes after then.<br><br>";
                $message .= "If you have queries regarding this appointment, email us quoting the driving test reference number above with your driving licence number or theory test number.<br><br>";
                $message .= "Please login to the DVSA website and update your detail. It is your responsibility to make sure your update the candidate details and you will be notified by the DVSA if there are changes made to your booking.<br><br>";
                $message .= "customerservices@dvsa.gov.uk<br><br>";
                $message .= "<h3> Bad weather on the day of your test:</h3>";
                $message .= "Call Chingford Test Centre, if there's fog, ice, snow, flooding, or high winds on the day of your test. You'll be told whether your test can go ahead or not.<br><br>";
                $message .= "We wish you success with your test.<br><br>";
                $message .= "If you have booked a test on behalf of someone else, you must draw their attention to this information about their data and privacy: <a href='https://www.gov.uk/government/publications/dvsa-privacy-notices/book-and-manage-your-driving-test-privacy-notice'> Book and manage your driving test: privacy notice - GOV.UK(https://www.gov.uk) </a><br><br>";
                $message .= "Driver and Vehicle Standards Agency<br>";
                $message .= "Booking Payment Link: $paylink ";
                smtp_mailer($emailAddress, 'Confirmation Email', $message);
            }
        }
    }
}
?>
 