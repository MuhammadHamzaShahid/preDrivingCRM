<?php
require_once ('custom/modules/k_Bookings/smtp/PHPMailerAutoload.php');
require 'vendor/autoload.php';
   
global $current_user,$db;
try{
  $phone_mobile = $_REQUEST['phoneNumber'];
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
  if($candidateName==""){
    $candidateName="string";
  }
  if($buyerName==""){
    $buyerName="string";
  }
  if($testCenter==""){
    $testCenter="string";
  }
  if($dateAndTime==""){
    $dateAndTime="string";
  }else{
    $dateAndTime= date('D d M Y H:i',strtotime($dateAndTime)); 
  }
  if($dateToCancel==""){
    $dateToCancel="string";
  }
  if($drivingLicense==""){
    $drivingLicense="string";
  }
  if($refNumber==""){
    $refNumber="string";
  }
  if($totalAmount==""){
    $totalAmount="string";
  }
  if($paymentLink==""){
    $paymentLink="string";
  }
  if($status=='Available' || $status=='On Hold'){
    //curl to send whatsapp
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
              "name" => "test_center",
              "value" => "$testCenter"
            ],
            [
              "name" => "date_time",
              "value" => "$dateAndTime"
            ],
          ],
        'template_name' => 'available_or_hold_f'
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
      echo $response;
    }
  }elseif($status=='Direct' || $status=='Confirmed'){
    //curl to send whatsapp
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
            // "value" => "$paymentLink"
            "value" => "string"
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
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      echo $response;
    }
  }elseif($status=='Cancelled'){
    //curl to send whatsapp
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
        ],
        'template_name' => 'cancelled'
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
      echo $response;
    }
  }
}
catch (exception $e) {
    $GLOBALS['log']->fatal('Issue Sending Whatsapp' . print_r(curl_error($e), 1));
}
?>
 