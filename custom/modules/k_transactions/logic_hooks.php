<?php
$hook_version = 1;
$hook_array = array();

$hook_array['before_save'] = array();
$hook_array['before_save'][] = array(1,'UpdateOutstandingAmount','custom/modules/k_transactions/update_outstanding_amount.php','updateOutstandingAmountClass','updateOutstandingAmount');