<?php
require_once('vendor/autoload.php');

array_push($job_strings, 'sendWhatsappReminder');
function sendWhatsappReminder()
{
  global $current_user,$db;
  try{
      $result = $db->query("SELECT id,k_phone_no FROM k_bookings WHERE DATE(k_last_date) = CURDATE() AND k_transaction_type = 'Unpaid'");
      while ($row = $db->fetchByAssoc($result)){
      $phone_mobile = $row['k_phone_no'];
      $phone_mobileExp = explode('+', $phone_mobile);
      $phone_mobile = $phone_mobileExp[1];
      $msgBody='For your assistance, I just have to remind you that today is the last date to change you Booking';
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
}