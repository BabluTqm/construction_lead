<?php

namespace App\Controller;
use Stripe;

class StripesController extends AppController
{
    public function stripe()
    {
        $this->set("title", "Stripe Payment Gateway Integration");
    }

    public function payment()
    { 
        $this->loadModel('ContractorCredit');
        $debit = 100;
        $id = $_GET['id'];
        dd($id);
        $total_balance = $this->ContractorCredit->find('all')->where(['user_id'=>$id]);
        dd($total_balance);
        require_once VENDOR_PATH. '/stripe/stripe-php/init.php';

        Stripe\Stripe::setApiKey(STRIPE_SECRET);
        $stripe = Stripe\Charge::create ([
                "amount" => 1 * 100,
                "currency" => "usd",
                "source" => $_REQUEST["stripeToken"],
                "description" => "Test payment via Stripe From onlinewebtutorblog.com" 
        ]);
        dd($stripe);
        // after successfull payment, you can store payment related information into your database
        $this->Flash->success(__('Payment done successfully'));
            
        return $this->redirect(['controller'=>'users','action' => 'dashboard']);
    }
}