<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Contracts\PaymentGateway;

class RazorpayController extends Controller
{

    protected $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway=$paymentGateway;
    }

    public function index()
    {
        return view('razorpay');
    }
    public function payment(Request $request)
    {
       $amount = $request->input('amount');
       $order = $this->paymentGateway->rpay($amount);

    //    $api = new Api(env('RAZORPAY_KEY'),env('RAZORPAY_SECRET'));
    //    $orderData = [
    //     'receipt' => 'order_'.rand(1000,9999),
    //     'amount' => $amount * 100,
    //     'currency' => 'INR',
    //     'payment_capture'=>1
    //    ];
    //    $order = $api->order->create($orderData);
       //echo $order['id'];
       return view('payment',['orderId'=>$order["id"],'amount' =>$amount * 100]);
    }
    public function callback(Request $request)
    {
        $payid = $request->payid;
        $orderid = $request->orderid;
        $sign = $request->sign;

        $api = new Api(env('RAZORPAY_KEY'),env('RAZORPAY_SECRET'));

        try
        {
            $attr = [
                'razorpay_order_id' => $orderid,
                'razorpay_payment_id' => $payid,
                'razorpay_signature' => $sign,
            ];

            $api->utility->verifyPaymentSignature($attr);
            echo "Payment Verified : ".$payid;
            //order table entry
        }
        catch(\Exception $e)
        {
            echo "Payment Verification Failed";
        }

    }



}
