<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not a valid entry point.');
}

class UpdateOutstandingAmountClass
{
    public function updateOutstandingAmount($bean, $event, $arguments)
    {
        if ($event == 'before_save') {
            // var_dump($bean->contacts_id);
            // die();
            // Check if the transaction is related to same contact
            if (!empty($bean->contacts_id)) {
                // Load the respective contact record
                $contactBean = BeanFactory::getBean('Contacts', $bean->contacts_id);

                // Update the outstanding amount in the contact record according to transaction amount
                $contactBean->amount = $bean->k_transaction_amount;
                $contactBean->save();
            }
        }
    }
}