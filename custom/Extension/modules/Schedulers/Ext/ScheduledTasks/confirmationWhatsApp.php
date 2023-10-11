<?php

require_once ('custom/modules/k_Bookings/smtp/PHPMailerAutoload.php');

array_push($job_strings, 'confirmationWhatsApp');
function confirmationWhatsApp()
{
    global $current_user,$db;
    try{
        $result = $db->query("SELECT id, k_phone_no, name, k_buyer_name, k_test_center, k_date_and_time, k_last_date, k_license_no, k_driving_test_ref_no, total, stripe_checkout_url FROM k_bookings WHERE k_status = 'Confirmed' OR k_status = 'Direct'  AND CAST(k_date_and_time AS DATE) = CAST(CURDATE() AS DATE) AND send_confirmation_whatsApp='0' AND k_transaction_type='Unpaid'");
        while ($row = $db->fetchByAssoc($result)){
          $id = $row['id'];
          $candidateName = $row['name'];
          $buyerName = $row['k_buyer_name'];
          $testCenter = $row['k_test_center'];
          $dateAndTime = $row['k_date_and_time'];
          $dateToCancel = $row['k_last_date'];
          $drivingLicense = $row['k_license_no'];
          $refNumber = $row['k_driving_test_ref_no'];
          $totalAmount = $row['total'];
          $paymentLink = $row['stripe_checkout_url'];
          $phone_mobile = $row['k_phone_no'];
          $phone_mobileExp = explode('+', $phone_mobile);
          $phone_mobile = $phone_mobileExp[1]; 
          $curl = curl_init();
          curl_setopt_array($curl, [
            CURLOPT_URL => "https://live-server-115159.wati.io/api/v1/sendTemplateMessage?whatsappNumber=".$phone_mobile,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'broadcast_name' => 'string',
                'parameters' => [
                    [
                            "name" => "name",
                            "value" => "$candidateName"
                    ],
                    [
                            "name" => "license_number",
                            "value" => "$drivingLicense"
                    ],
                    [
                            "name" => "test_center",
                            "value" => "$testCenter"
                    ],
                    [
                      "name" => "date_time",
                      "value" => "$dateAndTime"
                    ],
                    [
                      "name" => "ref_number",
                      "value" => "$refNumber"
                    ],
                    [
                      "name" => "last_date_to_cancel",
                      "value" => "$dateToCancel"
                    ],
                    [
                      "name" => "buyer_name",
                      "value" => "$buyerName"
                    ],
                    [
                      "name" => "total_amount",
                      "value" => "$totalAmount"
                    ],
                    [
                      "name" => "checkout_url",
                      "value" => "$paymentLink"
                    ],
                  ],
                'template_name' => 'send_whatsapp_booking_msg'
            ]),
            CURLOPT_HTTPHEADER => [
              "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiIwZGFjNDQwNi1jNGZlLTRkMTItODQ4Ni04ZDE5OWI3NWZiZTgiLCJ1bmlxdWVfbmFtZSI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsIm5hbWVpZCI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsImVtYWlsIjoiaW5mb0BwcmVkcml2aW5nLmNvLnVrIiwiYXV0aF90aW1lIjoiMTAvMTEvMjAyMyAwNDoxNzoyMSIsImRiX25hbWUiOiIxMTUxNTkiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBRE1JTklTVFJBVE9SIiwiZXhwIjoyNTM0MDIzMDA4MDAsImlzcyI6IkNsYXJlX0FJIiwiYXVkIjoiQ2xhcmVfQUkifQ.HbOMjn70Hy5rFN5QbBVoovq7_YRfV0hHfm85t_0UvmU",
              "content-type: text/json"
          ],
          ]);  
          $response = curl_exec($curl);
          if (curl_errno($curl)) {
              echo 'Error:' . curl_error($curl);
          }else{
            $db->query("UPDATE k_bookings SET send_confirmation_whatsApp='1' WHERE id='$id'");
          }
          curl_close($curl);
        }
      }
      catch (exception $e) {
          $GLOBALS['log']->fatal('leads whatsapp sent to client' . print_r(curl_error($e), 1));
      }
}
      return true;
?>