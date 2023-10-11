<?php
require_once ('custom/modules/k_Bookings/smtp/PHPMailerAutoload.php');
require 'vendor/autoload.php';
   
class sendBookingConfirmationWhatsAppMsg {
    public function sendBookingWhatsAppMsg($bean, $event, $arguments)
    {
        global $current_user,$db;
        try{
            if(empty($bean->fetched_row)){
                $candidateName = $bean->name;
                $buyerName = $bean->k_buyer_name;
                $testCenter = $bean->k_test_center;
                $dateAndTime = $bean->k_date_and_time;
                $dateToCancel = $bean->k_last_date;
                $drivingLicense = $bean->k_license_no;
                $refNumber = $bean->k_driving_test_ref_no;
                $totalAmount = $bean->total;
                $paymentLink = $bean->stripe_checkout_url;
                $phone_mobile = $bean->k_phone_no;
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
                                "name" => "test_center",
                                "value" => "$testCenter"
                        ],
                        [
                                "name" => "date_time1",
                                "value" => "$dateAndTime"
                        ],
                        [
                                "name" => "name",
                                "value" => "$buyerName"
                        ]
                    ],
                    'template_name' => 'reminder_message'
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
            $GLOBALS['log']->fatal('leads whatsapp sent to client' . print_r(curl_error($e), 1));
        }
    }
}
?>
 