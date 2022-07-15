<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Transaction;
use GuzzleHttp\Psr7\Header;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
// use Illuminate\Support\Facades\Config;
use App\Mail\TransactionSuccess;

use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(Request $request, $id){

        $items = Transaction::with(['details', 'travel_package', 'user'])->findOrFail($id);

        return view('pages.checkout', [
            'item' => $items
        ]);
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackage::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5)
        ]);

    return redirect()->route('checkout', $transaction->id);

    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'travel_package'])->findOrFail($item->transactions_id);

        if ($item->is_visa) {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_package->price;

        $transaction->save();

        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);

    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required'
        ]);

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);

        if($request->is_visa)
        {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id);

    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details', 'travel_package.galleries', 'user'])->findOrFail($id);
        $transaction->transaction_status = 'PEDING';

        $transaction->save();

        //configurasi Midtrans
        // Config::$serverKey = config('midtrans.serverKey');
        // Config::$isProduction = config('midtrans.isProduction');
        // Config::$isSanitized = config('midtrans.isSanitized');
        // Config::$is3ds = config('midtrans.id3ds');

        // //buat array untuk dikerim ke Midtrans
        // $midtrans_params = [
        //     'transaction_details' => [
        //         'order_id' => 'Travels-' . $transaction->id,
        //         'gross_amount' => (int) $transaction->transaction_total

        //     ],
            
        //     'customer_details' => [
        //         'first_name' => $transaction->user->name,
        //         'email' => $transaction->user->email

        //     ],

        //     'enabled_payment' => ['gopay'],
        //     'vtweb' => []
        // ];

        //     try {
        //         // ambil halaman payment midtrans
        //         $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

        //         // redirect ke halaman midtrans
        //         Header('Location: ' . $paymentUrl);

        //     } catch (Exception $e) {
        //         echo $e->getMessage();
        //     }

        // return $transaction;

        // kirim email ke user e-tiket
        Mail::to($transaction->user)->send(
            new TransactionSuccess($transaction)
        );

        return view('pages.success');
    }


}
