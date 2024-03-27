<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Payment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;
    private $cart_id;
    public function __construct(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }
    public function pay(Request $request){
        try{
            $response = $this->gateway->purchase([
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error'),
            ])->send();
            $request->session()->flash('cart_id', $request->input('cart_id'));
            if($response->isRedirect()){
                $response->redirect()->withInput();
            }
            else{
                return $response->getMessage();
            }
        }catch(\Throwable $th){
            return $th->getMessage();
        }
    }
    public function success(Request $request){
        $cart_ids = $request->session()->get('cart_id');
        if($request->input('paymentId') && $request->input('PayerID')){
            $transaction = $this->gateway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ]);
            $response = $transaction->send();
            if($response->isSuccessful()){
                $rawData = $response->getData();
                $data['payment_id'] = $rawData['id'];
                $data['payer_email'] = $rawData['transactions'][0]['payee']['email'];
                $data['payer_id'] = $rawData['id'];
                $data['amount'] = $rawData['transactions'][0]['amount']['total'];
                $data['currency'] = $rawData['transactions'][0]['amount']['currency'];
                $data['payment_status'] = $rawData['payer']['status'];
                foreach ($cart_ids as $value) {
                    Carts::where('id', $value)->delete();
                }
                Payment::create($data);
                return view('pages.paid');
            }
            else {
                return $response->getMessage();
            }
        }else{
            return 'noo';
        }
    }
    public function error(){
        return 'haaaa';
    }
}
