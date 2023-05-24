<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Helpers\Api;
use App\Models\Currency;
use App\Models\WalletType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Exceptions\InsufficientFunds;

class TransferController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $wallets = $user->wallets->where('slug','!=','ngn');
        $availableWallets = WalletType::crypto()->get();
        return view('user.transfer.index',compact('wallets','availableWallets'));
    }

    // public function get_fee_by_currency($currency_id)
    // {
    //     $currency = Currency::find($currency_id);
    //     $fees['data'] = Fee::where('slug',$currency->code)->first();
    //     return response()->json($fees);
    // }

    // public function initiate(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'wallet_id' => 'required|max:255',
    //         'address_id' => 'required',
    //         'amount' => 'required',
    //         'naration' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'code' => '201',
    //             'message' => 'Invalid Input',
    //             'data' => null,
    //         ]);
    //     }
    //     $user = Auth::user();
    //     $currency = Currency::find($request->wallet_id);
    //     if(!$user->hasWallet($currency->code))
    //     {
    //         return response()->json([
    //             'status' => 'failed',
    //             'code' => '202',
    //             'message' => 'Invalid Wallet',
    //             'data' => null,
    //         ]);
    //     }

    //     $response = Http::withToken(Api::quidax_api_key())->post(Api::quidax_base_url().'users/'.$user->user_key.'/withdraws',
    //     [
    //             'currency' => $currency->code,
    //             'amount' => $request->amount,
    //             'fund_uid' => 'ewfhwfnn',
    //             'transaction_note' => 'Cointik Transfer',
    //             'narration' => $request->naration,
    //     ]);

    //     if($response->successful())
    //     {
    //         $data = $response->object();

    //         if(isset($data->status) && $data->status == 'success')
    //         {
    //             try {
    //                 $myWallet = $user->getWallet($currency->code);
    //                 $myWallet->withdrawFloat($request->amount,[
    //                     'channel' => 'web',
    //                     'tnx_type' => 'transfer',
    //                     'method' => 'external',
    //                     'currency' => $currency->code,
    //                     'status' => 'processing',
    //                     'description' => 'Transfer Request Processed Successfully',
    //                     'data' => [],
    //                     'refund_at' => null,
    //                     'refund_data' => [],

    //                 ],false);
    //                 return response()->json([
    //                     'status' => 'success',
    //                     'code' => '200',
    //                     'message' => 'Transfer Request Processed Successfully',
    //                     'data' => null,
    //                 ]);

    //             }
    //             catch (BalanceIsEmpty $e) {
    //                 return response()->json([
    //                     'status' => 'failed',
    //                     'code' => '203',
    //                     'message' => 'You Have Not Any Balance Yet. Please Buy',
    //                     'data' => null,
    //                 ]);
    //             }
    //             catch (InsufficientFunds $e) {
    //                 return response()->json([
    //                     'status' => 'failed',
    //                     'code' => '204',
    //                     'message' => 'Insufficient Balance',
    //                     'data' => null,
    //                 ]);
    //             }
    //         }

    //         else{
    //             return response()->json([
    //                 'status' => 'failed',
    //                 'code' => '205',
    //                 'message' => 'Transaction Failed',
    //                 'data' => null,
    //             ]);
    //         }
    //     }
    //     return response()->json([
    //         'status' => 'failed',
    //         'code' => '205',
    //         'message' => 'Transaction Failed',
    //         'data' => null,
    //     ]);
    // }
}
