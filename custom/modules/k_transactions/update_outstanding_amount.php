<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not a valid entry point.');
}

class updateOutstandingAmountClass
{
    public function updateOutstandingAmount($bean, $event, $arguments)
    {
            if ($bean->k_transaction_type === 'Received'){
            if (!empty($bean->contacts_id)) {
                    // Load the respective contact record
                $contactBean = BeanFactory::getBean('Contacts', $bean->contacts_id);
                if (!empty($contactBean->amount)) {
                    // Subtract the transaction amount from the outstanding amount
                    $outstandingAmount = (float)$contactBean->amount - (float)$bean->k_transaction_amount;

                    // Update the outstanding amount in the contact record if transaction type is receieved
                    $contactBean->amount = $outstandingAmount;
                    $contactBean->save();
                }
            }
        }
    }
}