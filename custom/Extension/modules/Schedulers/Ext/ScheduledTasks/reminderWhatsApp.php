<?php

array_push($job_strings, 'reminderWhatsApp');
function reminderWhatsApp()
{
  global $current_user,$db;
    try{
      $result = $db->query("SELECT * FROM k_bookings WHERE CAST(k_last_date AS DATE) = CAST(CURDATE() AS DATE) AND deleted='0' AND (k_status = 'Confirmed' OR k_status = 'Direct' OR k_status = 'Available') AND send_confirmation_whatsApp='0' AND k_transaction_type='Unpaid'");
      while ($row = $db->fetchByAssoc($result)){
        $contactId = $row['contacts_id'];
            if($contactId!=''){
                $contactBean = BeanFactory::getBean("Contacts", $contactId);
                $name = $contactBean->first_name.' '.$contactBean->last_name;
            }else{
                $name = 'string';
            }
        $id = $row['id'];
        $candidateName= $row['name']; 
        $testCenter = $row['k_test_center'];
        $dateAndTime = $row['k_date_and_time'];
        $phone_mobile = $row['k_phone_no'];
        $phone_mobileExp = explode('+', $phone_mobile);
        $phone_mobile = $phone_mobileExp[1];
        if($phone_mobile!=''){
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
                          "name" => "buyer_name",
                          "value" => "$name"
                  ],
                  [
                    "name" => "candidate_name",
                    "value" => "$candidateName"
                  ],
                  [
                          "name" => "date_time1",
                          "value" => "$dateAndTime"
                  ],
                  [
                          "name" => "test_center",
                          "value" => "$testCenter"
                  ],
                ],
              'template_name' => 'reminder_message1'
          ]),
          CURLOPT_HTTPHEADER => [
              "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiIwZGFjNDQwNi1jNGZlLTRkMTItODQ4Ni04ZDE5OWI3NWZiZTgiLCJ1bmlxdWVfbmFtZSI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsIm5hbWVpZCI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsImVtYWlsIjoiaW5mb0BwcmVkcml2aW5nLmNvLnVrIiwiYXV0aF90aW1lIjoiMTAvMTEvMjAyMyAwNDoxNzoyMSIsImRiX25hbWUiOiIxMTUxNTkiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBRE1JTklTVFJBVE9SIiwiZXhwIjoyNTM0MDIzMDA4MDAsImlzcyI6IkNsYXJlX0FJIiwiYXVkIjoiQ2xhcmVfQUkifQ.HbOMjn70Hy5rFN5QbBVoovq7_YRfV0hHfm85t_0UvmU",
              "content-type: text/json"
          ],
          ]);
          $response = curl_exec($curl);
          $err = curl_error($curl);
          curl_close($curl);
          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            $db->query("UPDATE k_bookings SET send_confirmation_whatsApp='1' WHERE id='$id'");
            echo $response;
          }
        }
      }
    }
    catch (exception $e) {
        $GLOBALS['log']->fatal('leads whatsapp sent to client' . print_r(curl_error($e), 1));
    }
    return true;
}