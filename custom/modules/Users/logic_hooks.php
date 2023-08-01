<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_login'] = Array(); 
$hook_array['after_login'][] = Array(1, 'SugarFeed old feed entry remover', 'modules/SugarFeed/SugarFeedFlush.php','SugarFeedFlush', 'flushStaleEntries'); 
$hook_array['after_login'][] = Array(98, 'Record last user login date and time', 'custom/modules/Users/record_user_login.php','record_user_login_class', 'record_user_login_method');
$hook_array['before_logout'][] = Array(99, 'Record last user logout date and time', 'custom/modules/Users/record_user_logout.php','record_user_logout_class', 'record_user_logout_method');
?>