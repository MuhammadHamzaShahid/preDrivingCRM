<?php
require_once('vendor/autoload.php');

// array_push($job_strings, 'sendWhatsappReminder');
// function sendWhatsappReminder()
// {
  global $current_user,$db;
  try{
      $result = $db->query("SELECT id, k_phone_no, k_buyer_name, k_test_center, k_date_and_time FROM k_bookings WHERE DATE(k_last_date) = CURDATE() AND k_transaction_type = 'Unpaid'");
      while ($row = $db->fetchByAssoc($result)){
      $name = $row['k_buyer_name'];
      $testCenter = $row['k_test_center'];
      $dateAndTime = $row['k_date_and_time'];
      $phone_mobile = $row['k_phone_no'];
      $phone_mobileExp = explode('+', $phone_mobile);
      $phone_mobile = $phone_mobileExp[1];
      $msgBody = "Hi $name, this is a reminder for your upcoming Driving test on $dateAndTime at $testCenter Driving test centre. Should you wish to make changes, today is the last day to make any changes. We highly advised to login to the student portal and check all the details are correct and upto date. This is important because in the unlikely event that test gets moved you will be notified and it will save you money and time.";
      $ch = curl_init();
      
      curl_setopt($ch, CURLOPT_URL, 'https://live-server-115159.wati.io/api/v1/sendSessionMessage/'.$phone_mobile);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,"messageText=$msgBody");

      $headers = array();
      $headers[] = 'Accept: */*';
      $headers[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI0YjAxNGEyZi1mYTY2LTRlNjUtYWU4Zi0yOWYzODNjZjVlZTkiLCJ1bmlxdWVfbmFtZSI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsIm5hbWVpZCI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsImVtYWlsIjoiaW5mb0BwcmVkcml2aW5nLmNvLnVrIiwiYXV0aF90aW1lIjoiMDkvMjcvMjAyMyAxMDo1Nzo0MCIsImRiX25hbWUiOiIxMTUxNTkiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBRE1JTklTVFJBVE9SIiwiZXhwIjoyNTM0MDIzMDA4MDAsImlzcyI6IkNsYXJlX0FJIiwiYXVkIjoiQ2xhcmVfQUkifQ.9GMXM9BWCGHcNye1DOzy3DBlvtoh8Qqvmzb3oiZLTi8';
      $headers[] = 'Content-Type: application/x-www-form-urlencoded';
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      $curl_result = curl_exec($ch);
      if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
      }
      curl_close($ch);
      }
    } catch (exception $e) {
          $GLOBALS['log']->fatal('leads whatsapp sent to client' . print_r(curl_error($e), 1));
      }
    return true;
// }