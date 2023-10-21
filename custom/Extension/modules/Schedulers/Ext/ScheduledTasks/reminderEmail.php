<?php

require_once ('custom/modules/k_Bookings/smtp/PHPMailerAutoload.php');
array_push($job_strings, 'reminderEmail');
function reminderEmail()
{
    global $current_user,$db;
    $result = $db->query("SELECT * FROM k_bookings WHERE CAST(k_last_date AS DATE) = CAST(CURDATE() AS DATE) AND deleted='0' AND (k_status = 'Confirmed' OR k_status = 'Direct' OR k_status = 'Available') AND send_confirmation_email='0' AND k_transaction_type='Unpaid'");
    while ($row = $db->fetchByAssoc($result)) {
        $id = $row['id'];
        $emailAddress = $row['k_email'];
        if($emailAddress!=''){
            $contactId = $row['contacts_id'];
            if($contactId!=''){
                $contactBean = BeanFactory::getBean("Contacts", $contactId);
                $buyerName = $contactBean->first_name.' '.$contactBean->last_name;
            }else{
                $buyerName = '';
            }
            $candidateName = $row['name'];
            $testCenter = $row['k_test_center'];
            $dateAndTime = $row['k_date_and_time'];
            $dateToCancel = $row['k_last_date'];
            $drivingLicense = $row['k_license_no'];
            $refNumber = $row['k_driving_test_ref_no'];
            $totalAmount = $row['total'];
            $paymentLink = $row['stripe_checkout_url'];
            $message = "Hi $buyerName,\n This is a reminder that the named candidate $candidateName has their upcoming driving test on <strong>$dateAndTime</strong> at <strong>$testCenter</strong> Driving test centre. If you wish to make any changes, today will be the last day. We highly advise you to login to the student portal and check all the details are correct and up to date. This is important because in the unlikely event that test gets rescheduled, you will be notified saving you money and time.";
            smtp_mailer($emailAddress, 'Reminder Email', $message);
            echo $id;
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