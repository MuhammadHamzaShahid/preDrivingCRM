<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class buyerInfoFetchClass{
    public function buyerInfoFetchMethod(SugarBean $bean, $event, $arguments)
    {
        if($bean->contacts_id!=""){
            $contactBean = BeanFactory::getBean("Contacts", $bean->contacts_id);
            $bean->k_email=$contactBean->email1;
            $bean->k_phone_no=$contactBean->phone_mobile;
        }
    }
}