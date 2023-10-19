<?php 
$hook_version = 1; 
$hook_array = Array(); 
$hook_array['before_save'] = Array(); 
// whatsapp msges to create new lead
$hook_array['before_save'][] = Array(1, 'create new lead from whats app msges', 'custom/modules/li_license/whatsAppMessagesToCreateLead.php','whatsAppMessagesToCReateLeadClass', 'whatsAppMessagesToCReateLeadMethod');

?>