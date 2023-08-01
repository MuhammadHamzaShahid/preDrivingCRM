<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class record_user_login_class
{
        function record_user_login_method($bean, $event, $arguments)
        {
            global $timedate;
            $bean->description .= "\nLogged In: ".$timedate->nowDb();
            $bean->save();
        }
}

?>