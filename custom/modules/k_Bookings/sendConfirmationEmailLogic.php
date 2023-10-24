<?php
require_once('custom/modules/k_Bookings/smtp/PHPMailerAutoload.php');
require 'vendor/autoload.php';

//smtp details
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
        echo 'Sent';
    }
}
global $current_user, $db;
//getting data from request
$email = $_REQUEST['email'];
$status = $_REQUEST['status'];
$candidateName = $_REQUEST['candidateName'];
$buyerName = $_REQUEST['buyerName'];
$testCenter = $_REQUEST['testCenter'];
$dateAndTime = $_REQUEST['dateAndTime'];
$dateToCancel = $_REQUEST['dateToCancel'];
$drivingLicense = $_REQUEST['drivingLicense'];
$refNumber = $_REQUEST['refNumber'];
$totalAmount = $_REQUEST['totalAmount'];
$paymentLink = $_REQUEST['paymentLink'];
if ($candidateName == "") {
    $candidateName = "string";
}
if ($buyerName == "") {
    $buyerName = "string";
}
if ($testCenter == "") {
    $testCenter = "string";
}
if ($dateAndTime == "") {
    $dateAndTime = "string";
} else {
    $dateAndTime = date('D d M Y H:i', strtotime($dateAndTime));
}
if ($dateToCancel == "") {
    $dateToCancel = "string";
}else{
    $dateToCancel = date('D d M Y', strtotime($dateToCancel));
}
if ($drivingLicense == "") {
    $drivingLicense = "string";
}
if ($refNumber == "") {
    $refNumber = "string";
}
if ($totalAmount == "") {
    $totalAmount = "string";
}
if ($paymentLink == "") {
    $paymentLink = "string";
}
if ($status == 'Available' || $status == 'On Hold') {
    $message = "HI,<br><br>";
    $message .= "Just checking to see if you are happy to keep this test which we booked with the details you provided us:<br><br>";
    $message .= "<strong>Candidate Name: </strong>$candidateName<br>";
    $message .= "<strong>Test Centre: </strong>$testCenter<br>";
    $message .= "<strong>Date/Time: </strong>$dateAndTime<br><br>";
    $message .= "Please let us know as soon as possible so that we reserve the test for you. Otherwise, if we don’t hear back from you, we will have no choice but to pass it on.<br><br>";
    $message .= "Thank you.";
    smtp_mailer($email, 'Available/Hold Email', $message);
} elseif ($status == 'Direct' || $status == 'Confirmed') {
    $message = "Dear <u> <strong>$candidateName</strong>,</u><br><br>";
    $message .= "Your Car driving test is booked for <u> <strong>$dateAndTime</strong> </u> at <u> <strong>$testCenter</strong> </u> driving test centre.<br><br>";
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
    $message .= "You can change or cancel your test up until <strong>$dateToCancel</strong>. You'll lose your fee if you make any changes after then.<br><br>";
    $message .= "If you have queries regarding this appointment, email us quoting the driving test reference number above with your driving licence number or theory test number.<br><br>";
    $message .= "Please login to the DVSA website and update your detail. It is your responsibility to make sure your update the candidate details and you will be notified by the DVSA if there are changes made to your booking.<br><br>";
    $message .= "customerservices@dvsa.gov.uk<br><br>";
    $message .= "<h3> Bad weather on the day of your test:</h3>";
    $message .= "Call <strong>$testCenter</strong> Test Centre, if there's fog, ice, snow, flooding, or high winds on the day of your test. You'll be told whether your test can go ahead or not.<br><br>";
    $message .= "We wish you success with your test.<br><br>";
    $message .= "If you have booked a test on behalf of someone else, you must draw their attention to this information about their data and privacy: <a href='https://www.gov.uk/government/publications/dvsa-privacy-notices/book-and-manage-your-driving-test-privacy-notice'> Book and manage your driving test: privacy notice - GOV.UK(https://www.gov.uk) </a><br><br>";
    $message .= "Driver and Vehicle Standards Agency<br>";
    // $message .= "Booking Payment Link: $paylink ";
    smtp_mailer($email, 'Confirmation Email', $message);
} elseif ($status == 'Cancelled') {
    $message = "HI,<br><br>";
    $message .= "The test is now <strong>cancelled</strong> and DVSA will refund the test fee to the payment card used for the booking or by cheque. The refund is usually paid within 5 working days.<br><br>";
    $message .= "Thank you.";
    smtp_mailer($email, 'Cancellation Email', $message);
}
