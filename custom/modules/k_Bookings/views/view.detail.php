<?php
require_once('include/MVC/View/views/view.detail.php');
require_once 'custom/modules/k_Bookings/stripe-api/init.php';
require 'vendor/autoload.php';


class k_BookingsViewDetail extends ViewDetail {
    function display() { 
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
                // const data = JSON.stringify({
                //     broadcast_name: 'string',
                //     template_name: 'new_chat',
                //     parameters: [
                //     {
                //         name: 'string',
                //         value: 'string'
                //     }
                //     ]
                // });
                
                // const xhr = new XMLHttpRequest();
                // xhr.withCredentials = true;
                
                // xhr.addEventListener('readystatechange', function () {
                //     if (this.readyState === this.DONE) {
                //     console.log(this.responseText);
                //     }
                // });
                
                // xhr.open('POST', 'https://live-server-115159.wati.io/api/v1/sendTemplateMessage?whatsappNumber=%2B' + phoneNumber);
                // xhr.setRequestHeader('content-type', 'text/json');
                // xhr.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJqdGkiOiJjNzFlYTYwYS00NzU1LTQwZjUtYTNhNi1jNzEzOWU4MDA1ZTQiLCJ1bmlxdWVfbmFtZSI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsIm5hbWVpZCI6ImluZm9AcHJlZHJpdmluZy5jby51ayIsImVtYWlsIjoiaW5mb0BwcmVkcml2aW5nLmNvLnVrIiwiYXV0aF90aW1lIjoiMTAvMTAvMjAyMyAwNTo0OTo0NSIsImRiX25hbWUiOiIxMTUxNTkiLCJodHRwOi8vc2NoZW1hcy5taWNyb3NvZnQuY29tL3dzLzIwMDgvMDYvaWRlbnRpdHkvY2xhaW1zL3JvbGUiOiJBRE1JTklTVFJBVE9SIiwiZXhwIjoyNTM0MDIzMDA4MDAsImlzcyI6IkNsYXJlX0FJIiwiYXVkIjoiQ2xhcmVfQUkifQ.zMiy0seUdlchjEOJN89qwKnwgILhMHg60kc_JmtKmGU');
                // xhr.send(data);
                
                var watiUrl = 'https://live-115159.wati.io/teamInbox?filter={%22filterType%22:0}&search={%22searchString%22:' + phoneNumber + '}';        // Open the chatbox in a new window or tab
                window.open(watiUrl, '_blank');
            }
      </script>";
      //checkout url
      $url=$this->bean->stripe_checkout_url;
      echo "<button style='padding: 10px 20px; background-color: #F08377; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;' onclick='copyToClipboard(\"$url\")'>Copy Payment Link</button>";
      //whatsapp button
      $phone_mobile = $this->bean->k_phone_no;
      if($phone_mobile!=''){
        $phone_mobileExp = explode('+', $phone_mobile);
        $phone_mobile = $phone_mobileExp[1];
        echo "<button style='padding: 10px 20px; background-color: #25D366; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;' onclick='redirectToWatiChat(\"$phone_mobile\")'>WhatsApp Chat</button>";
    }else{
        echo "<button style='padding: 10px 20px; background-color: gray; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;'>WhatsApp Chat</button>";
    }
  parent::display();  
    }
}