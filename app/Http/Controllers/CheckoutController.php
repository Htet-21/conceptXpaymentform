<?php

namespace App\Http\Controllers;

use App\Checkout;
use App\Callback;
use App\CheckoutPlugin;
use App\Http\Requests\CheckoutPluginRequest;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function index()
    {
        return view('checkout.index');
    }

    public function index_mm()
    {
        return view('checkout.mm');
    }

    public function index_fix()
    {
        return view('checkout-fix.index');
    }

    public function index_fix_mm()
    {
        return view('checkout-fix.mm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function add(CheckoutRequest $request)
    {
        $input = $request->all();

        $lastDonation = Checkout::orderBy('id', 'desc')->first();

        if ($lastDonation == null) {
            $input['order_id'] = '001';
        } else {
            $input['order_id'] = '00' . ($lastDonation->id + 1);
        }

        $name = $request->input('customer_name');
        $customer_gender = $request->input('customer_gender');
        // $product_name = $request->input('customer_name');
        $amount = $request->input('amount');
        $birth = $request->input('birth');
        $cis = $request->input('cis');
        $grade = $request->input('grade');
        $phone = $request->input('phone');
        $name1 = $request->input('name1');
        $nrc1 = $request->input('nrc1');
        $name2 = $request->input('name2');
        $nrc2 = $request->input('nrc2');
        $sibling_num = $request->input('sibling_num');
        $sibling = $request->input('sibling');
        $guardian = $request->input('guardian');
        $viber = $request->input('viber');
        $states = $request->input('states'); 
        $address = $request->input('address');
        $occupation = $request->input('occupation');
        $email = $request->input('email');
        $currency = $request->input('currency');
        $quantity = 1;
        $total = $amount * $quantity;

        $input['total_amount'] = $total;

        Checkout::create($input);

        if ($lastDonation == null) {
            $orderId = '001';
        } else {
            $orderId = '00' . ($lastDonation->id + 1);
        }

        $items_data = array(
            "name" => "$name",
            "amount" => "$amount",
            "quantity" => "$quantity"
        );

        $data_pay = json_encode(array(
            "clientId" => "1654a62e-f3c3-3208-912e-22c1445bd57e",
            "publicKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCFkJTaXTCURxR59OHa9jH53xJqK6qWQA4g3YMxXyzTJa29jhmKUS2/4GN/Z5VbBETPZIGrJWcll0sSEo3oVbVCQ9JZtEqDKBNf6Km7y7GPXlyPX0Ng11gShQtbqtqjW6SVOJl/fMhZhay56pcy13h3PHNtn4oOrLE1A4bFwgYemwIDAQAB",
            "items" => json_encode(array($items_data)),
            "customerName" => $name,
            "totalAmount" => "$total",
            "currency" => "$currency",
            "merchantOrderId" => "$orderId",
            "merchantKey" => "bn19vus.bfDN_Ueb34FhRq2-HoP90G46hNI",
            "projectName" => "Conceptxlaravel",
            "merchantName" => "Soe Htet"
        ));

        $publicKey = '-----BEGIN PUBLIC KEY-----MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCFD4IL1suUt/TsJu6zScnvsEdLPuACgBdjX82QQf8NQlFHu2v/84dztaJEyljv3TGPuEgUftpC9OEOuEG29z7z1uOw7c9T/luRhgRrkH7AwOj4U1+eK3T1R+8LVYATtPCkqAAiomkTU+aC5Y2vfMInZMgjX0DdKMctUur8tQtvkwIDAQAB-----END PUBLIC KEY-----';

        $rsa = new \phpseclib\Crypt\RSA();

        extract($rsa->createKey(1024));
        $rsa->loadKey($publicKey); // public key
        $rsa->setEncryptionMode(2);
        $ciphertext = $rsa->encrypt($data_pay);
        $value = base64_encode($ciphertext);

        $urlencode_value = urlencode($value);

        $encryptedHashValue = hash_hmac('sha256', $data_pay, 'f62c786ab31bf42cf562fa358c89ca69');
        $redirect_url = "https://form.dinger.asia?hashValue=$encryptedHashValue&payload=$urlencode_value";

        return redirect($redirect_url);

    }

    public function add_for_fix (CheckoutRequest $request)
    {
        $input = $request->all();

        $lastDonation = Checkout::orderBy('id', 'desc')->first();

        if ($lastDonation == null) {
            $input['order_id'] = '001';
        } else {
            $input['order_id'] = '00' . ($lastDonation->id + 1);
        }

        $name = $request->input('customer_name');
        $gender = $request->input('customer_gender');
        // $product_name = $request->input('customer_name');
        $currency = $request->input('currency');
        $amount = 358200;
        $quantity = 1;
        $total = $amount * $quantity;

        $input['total_amount'] = $total;

        Checkout::create($input);

        if ($lastDonation == null) {
            $orderId = '001';
        } else {
            $orderId = '00' . ($lastDonation->id + 1);
        }

        $items_data = array(
            "name" => "$name",
            "amount" => "$amount",
            "quantity" => "$quantity"
        );

        $data_pay = json_encode(array(
            "clientId" => "1654a62e-f3c3-3208-912e-22c1445bd57e",
            "publicKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCFkJTaXTCURxR59OHa9jH53xJqK6qWQA4g3YMxXyzTJa29jhmKUS2/4GN/Z5VbBETPZIGrJWcll0sSEo3oVbVCQ9JZtEqDKBNf6Km7y7GPXlyPX0Ng11gShQtbqtqjW6SVOJl/fMhZhay56pcy13h3PHNtn4oOrLE1A4bFwgYemwIDAQAB",
            "items" => json_encode(array($items_data)),
            "customerName" => $name,
            "totalAmount" => "$total",
            "currency" => "$currency",
            "merchantOrderId" => "$orderId",
            "merchantKey" => "bn19vus.bfDN_Ueb34FhRq2-HoP90G46hNI",
            "projectName" => "Conceptxlaravel",
            "merchantName" => "Soe Htet"
        ));

        $publicKey = '-----BEGIN PUBLIC KEY-----MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCFD4IL1suUt/TsJu6zScnvsEdLPuACgBdjX82QQf8NQlFHu2v/84dztaJEyljv3TGPuEgUftpC9OEOuEG29z7z1uOw7c9T/luRhgRrkH7AwOj4U1+eK3T1R+8LVYATtPCkqAAiomkTU+aC5Y2vfMInZMgjX0DdKMctUur8tQtvkwIDAQAB-----END PUBLIC KEY-----';

        $rsa = new \phpseclib\Crypt\RSA();

        extract($rsa->createKey(1024));
        $rsa->loadKey($publicKey); // public key
        $rsa->setEncryptionMode(2);
        $ciphertext = $rsa->encrypt($data_pay);
        $value = base64_encode($ciphertext);

        $urlencode_value = urlencode($value);

        $encryptedHashValue = hash_hmac('sha256', $data_pay, 'f62c786ab31bf42cf562fa358c89ca69');
        $redirect_url = "https://form.dinger.asia?hashValue=$encryptedHashValue&payload=$urlencode_value";

        return redirect($redirect_url);

    }

    public function success($paymentResult, $checkSum)
    {
        return view('donation.success', compact('paymentResult', 'checkSum'));
    }

    public function getData($donationID)
    {
        // get records from database

        $callbackData = Callback::where('merchantOrderId', $donationID)->first();

        return view('getData', compact('callbackData'));
    }

    public function pin_getData($donationID)
    {
        // get records from database

        $callbackData = Callback::where('merchantOrderId', $donationID)->first();

        return view('pin-getData', compact('callbackData'));
    }

    public function confirmData($transactionNum, $formToken, $merchOrderId, $donationID)
    {
        // get records from database

        $donationData = Callback::where('donate_id', $donationID)->first();

        return view('donation.confirm-data', compact('donationData', 'transactionNum', 'formToken', 'merchOrderId', 'donationID'));
    }
}
