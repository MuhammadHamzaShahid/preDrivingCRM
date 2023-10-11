<?php

require_once ('custom/modules/k_Bookings/smtp/PHPMailerAutoload.php');

array_push($job_strings, 'confirmationEmail');
function confirmationEmail()
{
    global $current_user,$db;
    $result = $db->query("SELECT id, name, k_buyer_name, k_test_center, k_date_and_time, k_last_date, k_license_no, k_driving_test_ref_no, total, stripe_checkout_url FROM k_bookings WHERE k_status = 'Confirmed' OR k_status = 'Direct' AND CAST(k_date_and_time AS DATE) = CAST(CURDATE() AS DATE) AND send_confirmation_email='0' AND k_transaction_type='Unpaid'");
    while ($row = $db->fetchByAssoc($result)) {
        $id = $row['id'];
        $emailAddress = $row['k_email'];
        if($emailAddress!=''){
            $candidateName = $row['name'];
            $buyerName = $row['k_buyer_name'];
            $testCenter = $row['k_test_center'];
            $dateAndTime = $row['k_date_and_time'];
            $dateToCancel = $row['k_last_date'];
            $drivingLicense = $row['k_license_no'];
            $refNumber = $row['k_driving_test_ref_no'];
            $totalAmount = $row['total'];
            $paymentLink = $row['stripe_checkout_url'];
            $message = <<<EOD
            Please check the details below are correct as per your request. Any future changes to the booking may be subject to a £20 admin fee.
            
            Candidate Name
            $candidateName
            Driving Licence number
            $drivingLicense
            
            Test Centre
            $testCenter
            Date and Time
            $dateAndTime
            
            Driving test reference number:
            $refNumber
            Last date to cancel
            $dateToCancel
            
            Buyer's Name
            $buyerName
            
            Total Amount
            $totalAmount
            
            Thank you for booking with us.
            The booking will be confirmed once the payment is received.
            Please confirm the booking on https://www.gov.uk/change-driving-test
            All the best on the test.

            Payment Link
            $paymentLink
            EOD;
            smtp_mailer($emailAddress, 'Confirmation Email', $message);
            $db->query("UPDATE k_bookings SET send_confirmation_email='1' WHERE id='$id'");
        }
    }
    return true;
}
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
        $mail->Username = "mailto:sales@predriving.co.uk";
        $mail->Password = "Sales@2023";
        $mailto:mail->setfrom("sales@predriving.co.uk");
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

?>