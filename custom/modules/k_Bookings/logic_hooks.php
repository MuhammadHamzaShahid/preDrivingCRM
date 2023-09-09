<?php 
$hook_version = 1; 
$hook_array = Array(); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Data triming from test detail', 'custom/modules/k_Bookings/bookingLogicHook.php','bookingLogicHookClass', 'bookingLogicHookMethod'); 
$hook_array['before_save'][] = Array(2, 'stripe payment integration', 'custom/modules/k_Bookings/stripePaymentIntegration.php', 'stripePaymentIntegration',  'processStripePayment');
?>