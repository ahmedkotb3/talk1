<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
class PaypalController extends Controller
{
    private $_api_context;

    public function __construct()
    {

        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
public function gethend(){
    return "hend";
}

    public function pay(){

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');


        $email = Input::get('email2');
        $event_name = Input::get('event_name');
        $event_price = Input::get('price');

        $item_1 = new Item();
        $item_1->setName($event_name) // item name
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($event_price); // unit price


        // add item to list
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));



        $amount = new Amount();
        $amount->setCurrency('USD')
                ->setTotal($event_price);



        $transaction = new Transaction();
        $transaction->setAmount($amount)
        ->setItemList($item_list)
        ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route("payment.status")) // Specify return URL
                        ->setCancelUrl(URL::route("payment.status"));



        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());


        if(isset($redirect_url)) {
        // redirect to paypal
            return Redirect::away($redirect_url);
        }
        return Redirect::route('original.route')
            ->with('error', 'Unknown error occurred');
        }

    public function getPaymentStatus()
    {

        $payment_id = Session::get('paypal_payment_id');


        Session::forget('paypal_payment_id');


        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            return ('Payment failed');
        }


        $payment = Payment::get($payment_id, $this->_api_context);


        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        //Execute the payment
        $result = $payment->execute($execution, $this->_api_context);


        if ($result->getState() == 'approved') { // payment made
            return ('Payment success');
        } else {
            return ('Payment failed');
        }

    }



}