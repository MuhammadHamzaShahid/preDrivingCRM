<?php

require_once 'custom/modules/k_Bookings/stripe-api/init.php';
   
class stripePaymentIntegration {
        public function processStripePayment($bean, $event, $arguments)
        {
        // Check if the payment status is set to "Unpaid" before processing the payment
        if (empty($bean->fetched_row['id'])) {
            // Stripe API initialization


            //issue is in this line
            $stripe = new \Stripe\StripeClient('sk_test_51No6TRDFsKztdMU3MtY7OxycvHsaKjhAiSSqPG0lzfGngSoA3zCxW4MeemYI2aPuKNbNzkcKX7miGKrMU5rJ6nZA00BhRsvDc2');
            die($stripe.'aa');
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => $bean->total * 100,
                'currency' => 'eur',
                'automatic_payment_methods' => [
                'enabled' => true,
                ],
            ]);
            $bean->stripe_payment_id = $paymentIntent->id;
        }

        // Check if the total amount has changed
        if ($bean->fetched_row->total != $bean->total) {
            if ($bean->k_transaction_type == 'Unpaid') {
                $stripe = new \Stripe\StripeClient('sk_test_51No6TRDFsKztdMU3MtY7OxycvHsaKjhAiSSqPG0lzfGngSoA3zCxW4MeemYI2aPuKNbNzkcKX7miGKrMU5rJ6nZA00BhRsvDc2');
                // Update the payment intent with the new amount
                    $stripe->paymentIntents->update(
                    $bean->stripe_payment_id, 
                    ['amount' => $bean->total * 100,]
                );
            } 
        }
    }
}
?>
 