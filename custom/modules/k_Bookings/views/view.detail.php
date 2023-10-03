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
      $url=$this->bean->stripe_checkout_url;
      echo "<button style='padding: 10px 20px; background-color: #F08377; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;' onclick='copyToClipboard(\"$url\")'>Copy Payment Link</button>";

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
      </script>";

      $phone_mobile = $this->bean->k_phone_no;
      $phone_mobileExp = explode('+', $phone_mobile);
      $phone_mobile = $phone_mobileExp[1];
      echo "<button style='padding: 10px 20px; background-color: #25D366; color: #fff; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;' onclick='redirectToWatiChat(\"$phone_mobile\")'>WhatsApp Chat</button>";
      // wati chats script
      echo "<script>
      function redirectToWatiChat(phoneNumber) {
        var watiUrl = 'https://live-115159.wati.io/teamInbox?filter={%22filterType%22:0}&search={%22searchString%22:' + phoneNumber + '}';        // Open the chatbox in a new window or tab
        window.open(watiUrl, '_blank');
    }
      </script>";
  parent::display();  
    }
}