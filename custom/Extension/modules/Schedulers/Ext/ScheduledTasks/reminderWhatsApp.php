<?php
require_once('vendor/autoload.php');

array_push($job_strings, 'reminderWhatsApp');
function reminderWhatsApp()
{
  global $current_user,$db;
    try{
      $result = $db->query("SELECT id, k_phone_no, name, k_buyer_name, k_test_center, k_date_and_time, k_last_date, k_license_no, k_driving_test_ref_no, total, stripe_checkout_url FROM k_bookings WHERE k_status = 'Confirmed' OR k_status = 'Direct'  AND CAST(k_last_date AS DATE) = CAST(CURDATE() AS DATE) AND send_confirmation_whatsApp='0' AND k_transaction_type='Unpaid' AND deleted='0' ");
      while ($row = $db->fetchByAssoc($result)){
        $name = $row['k_buyer_name'];
        $testCenter = $row['k_test_center'];
        $dateAndTime = $row['k_date_and_time'];
        $phone_mobile = $row['k_phone_no'];
        $phone_mobileExp = explode('+', $phone_mobile);
        $phone_mobile = $phone_mobileExp[1];
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://live-server-11951.wati.io/api/v1/sendTemplateMessage?whatsappNumber='.$phone_mobile);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"template_name\": \"reminder_message\",\n  \"broadcast_name\": \"string\",\n  \"parameters\": [\n    {\n      \"name\": \"date_time1\",\n      \"value\": \"$dateAndTime\"\n    }\n  ]\n} ,  {\n      \"name\": \"test_center\",\n      \"value\": \"$testCenter\"\n    }\n  ]\n}");

        $headers = array();
        $headers[] = 'Accept: */*';
        $headers[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiI1MGFlMGZlMC1jYzk4LTQxOGYtOTcxNy1lOTMwYTQ2NGZhNzEiLCJ1bmlxdWVfbmFtZSI6InNhbGVzQHRoaW5rcmVhbHR5LmFlIiwibmFtZWlkIjoic2FsZXNAdGhpbmtyZWFsdHkuYWUiLCJlbWFpbCI6InNhbGVzQHRoaW5rcmVhbHR5LmFlIiwiYXV0aF90aW1lIjoiMTAvMDIvMjAyMiAyMTozMzozMSIsImRiX25hbWUiOiIxMTk1MSIsImh0dHA6Ly9zY2hlbWFzLm1pY3Jvc29mdC5jb20vd3MvMjAwOC8wNi9pZGVudGl0eS9jbGFpbXMvcm9sZSI6IkFETUlOSVNUUkFUT1IiLCJleHAiOjI1MzQwMjMwMDgwMCwiaXNzIjoiQ2xhcmVfQUkiLCJhdWQiOiJDbGFyZV9BSSJ9.cstVArPRA4x12SP89cikZhL_P3sg9SrIgkXvcESUW1k';
        $headers[] = 'Content-Type: application/json-patch+json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
        } else{
        $db->query("UPDATE k_bookings SET send_confirmation_whatsApp='1' WHERE id='$id'");
        }
        curl_close($ch);
      }
    }
    catch (exception $e) {
        $GLOBALS['log']->fatal('leads whatsapp sent to client' . print_r(curl_error($e), 1));
    }
    return true;
}