<?php 
$hook_version = 1; 
$hook_array = Array(); 
// $hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1, 'Data triming from test detail', 'custom/modules/k_Bookings/bookingLogicHook.php','bookingLogicHookClass', 'bookingLogicHookMethod'); 
$hook_array['before_save'][] = Array(2, 'stripe payment integration', 'custom/modules/k_Bookings/stripePaymentIntegration.php', 'stripePaymentIntegration',  'processStripePayment');
$hook_array['before_save'][] = Array(3, 'send Booking Confirmation mail to every Booking', 'custom/modules/k_Bookings/sendConfirmationEmailLogic.php', 'sendBookingConfirmationEmail',  'sendBookingEmail');
$hook_array['before_save'][] = Array(4, 'send Booking Confirmation WhatsApp Message to every Booking', 'custom/modules/k_Bookings/sendConfirmationWhatsAppLogic.php', 'sendBookingConfirmationWhatsAppMsg',  'sendBookingWhatsAppMsg');

// whatsapp msges to create new lead
// $hook_array['before_save'][] = Array(3, 'create new lead from whats app msges', 'custom/modules/k_Bookings/whatsAppMessagesToCreateLead.php','whatsAppMessagesToCReateLeadClass', 'whatsAppMessagesToCReateLeadMethod'); 

?>