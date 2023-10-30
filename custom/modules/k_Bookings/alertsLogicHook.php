<?php
class alertsClass {
    public function alertsMethod($bean, $event, $arguments){
        if($bean->fetched_row['k_status']!=$bean->k_status){
            $alertBean = BeanFactory::newBean('Alerts');
            $alertBean->name = 'Booking '.$bean->k_status;
            $alertBean->description = "Booking status has been changed to #: $bean->k_status ";
            $alertBean->target_module = 'Bookings';
            $alertBean->type = 'info';
            $alertBean->reminder_id = '1172dda1-7b4b-26bd-c01a-64c7c8b2cb0a';
            $alertBean->assigned_user_id = '1172dda1-7b4b-26bd-c01a-64c7c8b2cb0a';
            $alertBean->is_read = '0';
            $alertBean->url_redirect = 'index.php?action=DetailView&module=k_Bookings&record=' . $bean->id;
            $alertBean->save();
        }   
    }
}
?>