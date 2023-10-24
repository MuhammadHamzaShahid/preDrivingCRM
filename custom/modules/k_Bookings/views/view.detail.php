<?php
require_once('include/MVC/View/views/view.detail.php');
require_once 'custom/modules/k_Bookings/stripe-api/init.php';
require 'vendor/autoload.php';


class k_BookingsViewDetail extends ViewDetail
{
    function display()
    {
        global $current_user;
        if (!$current_user->is_admin) {
            echo "<script> 
              $('#btn_view_change_log').hide();
          </script>";
        }
        // copy the payment link to the clipboard
        echo "<script>
            function copyToClipboard(text) {
                var dummy = document.createElement('textarea');
                document.body.appendChild(dummy);
                dummy.value = text;
                dummy.select();
                document.execCommand('copy');
                document.body.removeChild(dummy);
                alert('Payment link copied to clipboard!');
            }
            function redirectToWatiChat(phoneNumber) {
                const data = JSON.stringify({
                    broadcast_name: 'string',
                    template_name: 'new_chat',
                    parameters: [
                    {
                        name: 'string',
                        value: 'string'
                    }
                    ]
                });
                
                const xhr = new XMLHttpRequest();
                xhr.withCredentials = true;
                
                xhr.addEventListener('readystatechange', function () {
                    if (this.readyState === this.DONE) {
                    console.log(this.responseText);
                    }
                });
                
                xhr.open('POST', 'https://live-server-115159.wati.io/api/v1/sendTemplateMessage?whatsappNumber=%2B' + phoneNumber);
                xhr.setRequestHeader('content-type', 'text/json');
                xhr.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiJjNzFlYTYwYS00NzU1LTQwZjUtYTNhNi1jNzEzOWU4MDA1ZTQiLCJ1bmlxdWVfbmFtZSI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsIm5hbWVpZCI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsImVtYWlsIjoiaW5mb0BwcmVkcml2aW5nLmNvLnVrIiwiYXV0aF90aW1lIjoiMTAvMTAvMjAyMyAwNTo0OTo0NSIsImRiX25hbWUiOiIxMTUxNTkiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBRE1JTklTVFJBVE9SIiwiZXhwIjoyNTM0MDIzMDA4MDAsImlzcyI6IkNsYXJlX0FJIiwiYXVkIjoiQ2xhcmVfQUkifQ.zMiy0seUdlchjEOJN89qwKnwgILhMHg60kc_JmtKmGU');
                xhr.send(data);
                
                var watiUrl = 'https://live-115159.wati.io/teamInbox?filter={%22filterType%22:0}&search={%22searchString%22:' + phoneNumber + '}';        // Open the chatbox in a new window or tab
                window.open(watiUrl, '_blank');
            }
            function sendDetailsToWhatsApp(phoneNumber,status,candidateName,buyerName,testCenter,dateAndTime,dateToCancel,drivingLicense,refNumber,totalAmount,paymentLink){
                $.ajax({
                    type: 'GET',
                    data: {
                        phoneNumber:phoneNumber,
                        status:status,
                        candidateName:candidateName,
                        buyerName:buyerName,
                        testCenter:testCenter,
                        dateAndTime:dateAndTime,
                        dateToCancel:dateToCancel,
                        drivingLicense:drivingLicense,
                        refNumber:refNumber,
                        totalAmount:totalAmount,
                        paymentLink:paymentLink,
                    },
                    url: 'index.php?module=k_Bookings&action=sendConfirmationWhatsAppLogic&sugar_body_only=true',
                    success: function (response) {
                        var result=JSON.parse(response);
                        if(result['result']==true){
                            alert('WhatsApp Sent!');
                        }else{
                            alert('WhatsApp Not Sent!');
                        }
                    }
                });
            }
            function sendDetailsToEmail(email,status,candidateName,buyerName,testCenter,dateAndTime,dateToCancel,drivingLicense,refNumber,totalAmount,paymentLink){
                $.ajax({
                    type: 'GET',
                    data: {
                        email:email,
                        status:status,
                        candidateName:candidateName,
                        buyerName:buyerName,
                        testCenter:testCenter,
                        dateAndTime:dateAndTime,
                        dateToCancel:dateToCancel,
                        drivingLicense:drivingLicense,
                        refNumber:refNumber,
                        totalAmount:totalAmount,
                        paymentLink:paymentLink,
                    },
                    url: 'index.php?module=k_Bookings&action=sendConfirmationEmailLogic&sugar_body_only=true',
                    success: function (response) {
                        if(response=='Sent'){
                            alert('Email Sent!');
                        }else{
                            alert('Email Not Sent!');
                        }
                    }
                });
            }
      </script>";
        //checkout url
        $url = $this->bean->stripe_checkout_url;
        echo "<button style='padding: 10px 20px; background-color: #F08377; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;' onclick='copyToClipboard(\"$url\")'>Copy Payment Link</button>";
        //whatsapp button
        $phone_mobile = $this->bean->k_phone_no;
        if ($phone_mobile != '') {
            $phone_mobileExp = explode('+', $phone_mobile);
            $phone_mobile = $phone_mobileExp[1];
            $status = $this->bean->k_status;
            $candidateName = $this->bean->name;
            $buyerName = $this->bean->contacts_name;
            $testCenter = $this->bean->k_test_center;
            $dateAndTime = $this->bean->k_date_and_time;
            $dateToCancel = $this->bean->k_last_date;
            $drivingLicense = $this->bean->k_license_no;
            $refNumber = $this->bean->k_driving_test_ref_no;
            $totalAmount = $this->bean->total;
            $paymentLink = $this->bean->stripe_checkout_url;

            echo "<button style='padding: 10px 20px; background-color: #25D366; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;' onclick='redirectToWatiChat(\"$phone_mobile\")'>Open WhatsApp Chat</button>";
            echo "<button style='padding: 10px 20px; background-color: #25D366; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;' onclick='sendDetailsToWhatsApp(\"$phone_mobile\",\"$status\",\"$candidateName\",\"$buyerName\",\"$testCenter\",\"$dateAndTime\",\"$dateToCancel\",\"$drivingLicense\",\"$refNumber\",\"$totalAmount\",\"$paymentLink\")'>Send Details To WhatsApp</button>";
        } else {
            echo "<button style='padding: 10px 20px; background-color: gray; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;'>Open WhatsApp Chat</button>";
            echo "<button style='padding: 10px 20px; background-color: gray; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;'>Send Details To WhatsApp</button>";
        }
        //email button
        $email = $this->bean->k_email;
        if ($email != '') {
            $email = trim($email);
            $status = $this->bean->k_status;
            $candidateName = $this->bean->name;
            $buyerName = $this->bean->contacts_name;
            $testCenter = $this->bean->k_test_center;
            $dateAndTime = $this->bean->k_date_and_time;
            $dateToCancel = $this->bean->k_last_date;
            $drivingLicense = $this->bean->k_license_no;
            $refNumber = $this->bean->k_driving_test_ref_no;
            $totalAmount = $this->bean->total;
            $paymentLink = $this->bean->stripe_checkout_url;

            echo "<button style='padding: 10px 20px; background-color: #DD5244; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;' onclick='sendDetailsToEmail(\"$email\",\"$status\",\"$candidateName\",\"$buyerName\",\"$testCenter\",\"$dateAndTime\",\"$dateToCancel\",\"$drivingLicense\",\"$refNumber\",\"$totalAmount\",\"$paymentLink\")'>Send Details To Email</button>";
        } else {
            echo "<button style='padding: 10px 20px; background-color: gray; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;'>Send Details To Email</button>";
        }
        parent::display();
    }
}
