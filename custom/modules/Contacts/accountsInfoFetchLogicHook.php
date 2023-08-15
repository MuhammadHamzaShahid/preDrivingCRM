<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
class accountsInfoFetchClass{
    public function accountsInfoFetchMethod(SugarBean $bean, $event, $arguments)
    {
        if ($bean->fetched_row['account_id']!=$bean->account_id){
            $accountBean = BeanFactory::getBean("Accounts", $bean->account_id);
            $bean->last_name=$accountBean->name;
            $bean->email1=$accountBean->email1;
            $bean->phone_mobile=$accountBean->phone_office;
        }
    }
}
