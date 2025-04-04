<?php

namespace App\Services;
use App\Contracts\PaymentGateway;
use Razorpay\Api\Api;

class RazorpayPaymentService implements PaymentGateway
{
    // RAZORPAY_KEY = "rzp_test_aro7DmNCYha043"
    //RAZORPAY_SECRET = "WbMUfLsVEcKVp7IF1nJpNU3a"
    protected $api;

    public function __construct()
    {
        $this->api  = new Api(env('RAZORPAY_KEY'),env('RAZORPAY_SECRET'));
    }

    public function rpay($amount)
    {
         $orderData = [
            'receipt' => 'order_'.rand(1000,9999),
            'amount' => $amount * 100,
            'currency' => 'INR',
            'payment_capture'=>1
           ];
           $order = $this->api->order->create($orderData);
           return $order;
    }
}
