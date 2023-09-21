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
  parent::display();  
    }
}