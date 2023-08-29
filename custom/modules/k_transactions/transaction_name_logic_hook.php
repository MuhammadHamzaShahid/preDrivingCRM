<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class transactionNamelogicHookClass
{
    public function transactionNamelogicHookMethod($bean, $event, $arguments)
    {
        if (empty($bean->fetched_row)) {
            // Get the current count of transactions
            $transactionCount = $this->getCurrentTransactionCount();

            // Generate the name for the new transaction
            $newTransactionName = "Booking_Transaction_" . ($transactionCount + 1);

            // Set the generated name to the name field of the new transaction
            $bean->name = $newTransactionName;
        }
    }

        private function getCurrentTransactionCount()
        {
            // Query to get the current count of bookings transactions
            $query = "SELECT COUNT(*) AS count FROM k_transactions where k_bookings_id='$bean->k_bookings_id'";

            // Execute the query and retrieve the count of transactions
            $result = $GLOBALS['db']->query($query);
            $row = $GLOBALS['db']->fetchByAssoc($result);
            $count = $row['count'];
            return $count;
        }
}   