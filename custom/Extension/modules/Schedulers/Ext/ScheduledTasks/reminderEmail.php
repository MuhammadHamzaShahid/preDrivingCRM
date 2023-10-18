<?php

require_once ('custom/modules/k_Bookings/smtp/PHPMailerAutoload.php');

array_push($job_strings, 'reminderEmail');
function reminderEmail()
{
    global $current_user,$db;
    $result = $db->query("SELECT id, contacts_id, name, k_email, k_test_center, k_date_and_time, k_last_date, k_license_no, k_driving_test_ref_no, total, stripe_checkout_url FROM k_bookings WHERE k_status = 'Confirmed' OR k_status = 'Direct' OR k_status = 'Available' AND CAST(k_last_date AS DATE) = CAST(CURDATE() AS DATE) AND send_confirmation_email='0' AND k_transaction_type='Unpaid' AND deleted='0' ");
    while ($row = $db->fetchByAssoc($result)) {
        $id = $row['id'];
        $emailAddress = $row['k_email'];
        if($emailAddress!=''){
            $candidateName = $row['name'];
            $contactId = $row['contacts_id'];
            if($contactId!=''){
                $contactBean = BeanFactory::getBean("Contacts", $contactId);
                $buyerName = $contactBean->full_name;
                $testCenter = $row['k_test_center'];
                $dateAndTime = $row['k_date_and_time'];
                $dateToCancel = $row['k_last_date'];
                $drivingLicense = $row['k_license_no'];
                $refNumber = $row['k_driving_test_ref_no'];
                $totalAmount = $row['total'];
                $paymentLink = $row['stripe_checkout_url'];
                $message = "Hi $buyerName, this is a reminder for your upcoming driving test on $dateAndTime at $testCenter Driving test centre. If you wish to make changes, today is the last day to make any changes. We highly advised to login to the student portal and check all the details are correct and upto date. This is important because in the unlikely event that test gets moved you will be notified and it will save you money and time.";
                smtp_mailer($emailAddress, 'Confirmation Email', $message);
                $db->query("UPDATE k_bookings SET send_confirmation_email='1' WHERE id='$id'");
            }
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
        // echo $mail->ErrorInfo;
    } else {
        // echo 'Sent';
    }
}


?>