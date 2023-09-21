<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

class dashboardFunctions{
    public function processTasks($tasksArr){
        global $timedate;
        $currentTime =  $timedate->asDbType($timedate->getNow(),'datetime');
        $taskBeansArr= array();
        foreach($tasksArr as $key=>$val) {
            $bean = BeanFactory::getBean("Tasks", $val);
            $dueObj = new DateTime($bean->date_due);
            $dueObj->format('Y-m-d\TH:i:s.u');
            $due =  $timedate->asDbType($dueObj,'datetime');
            if($due<$currentTime)
                $bean->textcolor = 'red';

            if($bean->status=='Not Started') {
                $bean->class = 'danger';
            }
            else if($bean->status=='In Progress')
                $bean->class='primary';

            else if($bean->status=='Completed')
                $bean->class='success';

            array_push($taskBeansArr,$bean);
        }
        return $taskBeansArr;
    }
    public function processLeads($leadArr){
        $leadBeansArr= array();
        foreach($leadArr as $key=>$val) {
            $bean = BeanFactory::getBean("Leads", $val);
            if($bean->status=='New')
                $bean->class='default';

            if($bean->status=='Assigned')
                $bean->class='primary';

            if($bean->status=='In Process')
                $bean->class='success';
            array_push($leadBeansArr,$bean);
        }
        return $leadBeansArr;
    }
    public function processInvoices($InvoiceArr){
        $InvoiceBeansArr= array();
        foreach($InvoiceArr as $key=>$val) {
            $bean = BeanFactory::getBean("AOS_Invoices", $val);
            /* if($bean->status=='New')
                $bean->class='default';
            if($bean->status=='Assigned')
                $bean->class='primary';

            if($bean->status=='In Process')
                $bean->class='success'; */
            array_push($InvoiceBeansArr,$bean);
        }
        return $InvoiceBeansArr;
    }
    public function processContacts($contactsArr){
        $contactBeansArr= array();
        foreach($contactsArr as $key=>$val) {
            $bean = BeanFactory::getBean("Contacts", $val);
            if ($bean->load_relationship('opportunities')) {
                $relatedRecords = $bean->opportunities->getBeans();
                if (empty($relatedRecords)) {
                    $bean->class='warning';
                }
                else
                    $bean->class='success';
            }
            else
                $bean->class='warning';
            array_push($contactBeansArr,$bean);
        }
        return $contactBeansArr;

    }
    public function processOpportunities($oppArr){
        $oppBeansArr= array();
        foreach($oppArr as $key=>$val) {
            $bean = BeanFactory::getBean("Opportunities", $val);
//            if($bean->contact_stage=='New')
//                $bean->class = 'default';
//            else if($bean->contact_stage=='Data Collection')
//                $bean->class='info';
//            else if($bean->contact_stage=='Assigned To Admission')
//                $bean->class='primary';
//            else if($bean->contact_stage=='Ready For Application')
//                $bean->class='warning';
//            else if($bean->contact_stage=='Admission Applied')
//                $bean->class='success';

            array_push($oppBeansArr,$bean);
        }
        return $oppBeansArr;
    }
}
