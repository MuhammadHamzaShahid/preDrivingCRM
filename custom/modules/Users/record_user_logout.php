<?php
 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class record_user_logout_class
{
        function record_user_logout_method($bean, $event, $arguments)
        {
            global $timedate;
            $bean->description .= "\nLogged Out: ".$timedate->nowDb();
            $bean->save();
        }
}

?>