<?php 
$hook_version = 1; 
$hook_array = Array(); 
$hook_array['before_save'] = Array(); 
// whatsapp msges to create new lead
$hook_array['before_save'][] = Array(1, 'Fetching Buyer Info', 'custom/modules/k_Bookings/buyerInfoFetchLogicHook.php','buyerInfoFetchClass', 'buyerInfoFetchMethod'); 
$hook_array['before_save'][] = Array(3, 'Data triming from test detail', 'custom/modules/k_Bookings/bookingLogicHook.php','bookingLogicHookClass', 'bookingLogicHookMethod'); 
$hook_array['before_save'][] = Array(4, 'stripe payment integration', 'custom/modules/k_Bookings/stripePaymentIntegration.php', 'stripePaymentIntegration',  'processStripePayment');
$hook_array['before_save'][] = Array(5, 'Alerts', 'custom/modules/k_Bookings/alertsLogicHook.php', 'alertsClass',  'alertsMethod');
// $hook_array['before_save'][] = Array(5, 'send Booking Confirmation mail to every Booking', 'custom/modules/k_Bookings/sendConfirmationEmailLogic.php', 'sendBookingConfirmationEmail',  'sendBookingEmail');
// $hook_array['before_save'][] = Array(6, 'send Booking Confirmation WhatsApp Message to every Booking', 'custom/modules/k_Bookings/sendConfirmationWhatsAppLogic.php', 'sendBookingConfirmationWhatsAppMsg',  'sendBookingWhatsAppMsg');


?>