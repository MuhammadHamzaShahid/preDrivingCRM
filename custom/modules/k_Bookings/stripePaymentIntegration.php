<?php

require_once 'custom/modules/k_Bookings/stripe-api/init.php';
require 'vendor/autoload.php';
   
class stripePaymentIntegration {
        public function processStripePayment($bean, $event, $arguments)
        {
        if ($bean->k_transaction_type == 'Unpaid') {
            $stripe = new \Stripe\StripeClient('sk_live_NdcALSCDETFg6oNlV189y4Au');
            $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => 'Booking',
                ],
                'unit_amount' => $bean->total * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'https://www.predriving.co.uk/preDrivingCRM/success.php',
            'cancel_url' => 'https://www.predriving.co.uk/preDrivingCRM/cancel.php',
            'metadata' => [
                'k_bookings_id' => $bean->id,
            ],
            ]); 
            $bean->stripe_checkout_url=$checkout_session->url;
            $bean->stripe_payment_id=$checkout_session->id;
        }
    }
}
?>
 