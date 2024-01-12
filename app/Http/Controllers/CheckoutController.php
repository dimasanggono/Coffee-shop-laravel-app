<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transactions;
use App\Models\TransactionDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Transaction;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // // proses checkout
        $code = 'STORE-' . mt_rand(000, 9999);
        $carts = Cart::with(['product', 'users'])->where('user_id', Auth::user()->id)->get();

        $transactions = Transactions::create([
            'user_id' => Auth::user()->id,
            'total_price' => $request->total_price,
            'status' => 'PENDING',
            'no_tables' => $request->no_tables,
            'code' => $code
        ]);

        foreach ($carts as $cart) {

            TransactionDetails::create([
                'id_transaction' => $transactions->id,
                'id_product' => $cart->product->id,
                'price' => $cart->product->price,
                'quantity' => $cart->quantity
            ]);
        }
        // delete Cart
        Cart::where('user_id', Auth::user()->id)->delete();


        // config midtrans 
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $midtrans = [
            "transaction_details" => [
                "order_id" => $code,
                "gross_amount" => (int)  $request->total_price
            ],
            "customer_details" => [
                "first_name" => Auth::user()->name,
                "email" => Auth::user()->email,
            ],
            "enabled_payments" => [
                "gopay", "bank_transfer", "bca_va"
            ],
            "vtweb" => []
        ];
        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback()
    {
        // konfigurasi midtrans 
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // cari transaksi berdasarkan id

        $notification = new Notification();

        $status = $notification->transaction_status;
        $type =  $notification->payment_type;
        $fraud =  $notification->fraud_status;
        $order_id =  $notification->order_id;

        $transaction = Transactions::findOrFail($order_id);

        // handle notification status
        if ($status == "capture") {
            if ($type = "credit_card") {
                if ($fraud == "challenge") {
                    $transaction->status = "PENDING";
                } else {
                    $transaction->status = "SUCCESS";
                }
            }
        } else if ($status == 'settlement') {
            $transaction->status = 'SUCCESS';
        } else if ($status == 'pending') {
            $transaction->status = 'PENDING';
        } else if ($status == 'deny') {
            $transaction->status = 'CANCELLED';
        } else if ($status == 'expire') {
            $transaction->status = 'CANCELLED';
        } else if ($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }

        // Simpan transaksi
        $transaction->save();
    }
}
