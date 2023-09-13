<?php
require_once ('vendor/autoload.php');
require_once ('custom/modules/k_Bookings/stripe-api/init.php');

array_push($job_strings, 'paymentStatusUpdateStripe');
function paymentStatusUpdateStripe()
{    
    global $current_user,$db;
    $result = $db->query("SELECT id,stripe_payment_id FROM k_bookings WHERE k_transaction_type = 'Unpaid' AND stripe_payment_id !=''");
    while ($row = $db->fetchByAssoc($result)) {
        $stripe_payment_id=$row['stripe_payment_id'];
        $stripe = new \Stripe\StripeClient('sk_test_51Np1veJI0mOq207PEKdoKbaaZwRzUGkPY8TweGOWbfg4GSLr6ajF7xZZXscvQHXUy4cVU4wzJarPYKlFwaMK48ll00LxBXtWTi');
        $session = $stripe->checkout->sessions->retrieve($stripe_payment_id);
        $payment_status = $session->payment_status;
        if ($payment_status === 'paid') {
            $bookingId = $row['id'];
            $db->query("UPDATE k_bookings SET k_transaction_type = 'Paid' WHERE id = '{$bookingId}'");
        }
    }
    return true;
}   
