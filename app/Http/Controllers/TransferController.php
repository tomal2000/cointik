<?php

namespace App\Http\Controllers;

use App\Helpers\Api;
use App\Models\Market;
use App\Models\WalletType;
use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Bavix\Wallet\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
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

    public function exchange_rate($market)
    {
        $market = Market::where('code',$market)->first();
        return response()->json($market->ticker);
    }

    // public function get_fee_by_currency($currency_id)
    // {
    //     $currency = Currency::find($currency_id);
    //     $fees['data'] = Fee::where('slug',$currency->code)->first();
    //     return response()->json($fees);
    // }

    public function initiate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wallet_id' => 'required|integer',
            'address_id' => 'required|integer',
            'crypto_amount' => 'required|numeric',
            'note' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $validator->errors()->getMessages();
            Alert::alert('Failed!', 'Invalid Input.', 'error');
            return redirect()->back();
        }
        $user = Auth::user();
        $wallet = Wallet::find($request->wallet_id);
        if(!$wallet)
        {
            Alert::alert('Failed!', 'Invalid Wallet.', 'error');
            return redirect()->back();
        }

        $beneficiary = Beneficiary::find($request->address_id);
        if(!$beneficiary)
        {
            Alert::alert('Failed!', 'Invalid Beneficiary.', 'error');
            return redirect()->back();
        }
        DB::beginTransaction();
        try {
        $myWallet = $user->getWallet($wallet->slug);
        $myWallet->withdrawFloat($request->crypto_amount,[
            'channel' => 'web',
            'tnx_type' => 'transfer',
            'method' => 'external',
            'currency' => $wallet->slug,
            'status' => 'processing',
            'description' => 'Transfer Request Processed Successfully',
            'data' => [],
            'refund_at' => null,
            'refund_data' => [],

        ],false);

        $response = Http::withToken(Api::quidax_api_key())->post(Api::quidax_base_url().'users/me/withdraws',
        [
                'currency' => $wallet->slug,
                'amount' => $request->amount,
                'fund_uid' => $beneficiary->address,
                'transaction_note' => 'Cointik Transfer',
                'narration' => $request->note,
        ]);

        if($response->successful())
        {
            $data = $response->object();

            if(isset($data->status) && $data->status == 'success')
            {

                    DB::commit();
                    Alert::alert('Success!', 'Withdraw Successful', 'success');
                    return redirect()->back();


            }
            elseif(isset($data->status) && $data->status == 'error')
            {
                Alert::alert('Failed!', $data->message, 'warning');
                return redirect()->back();
            }

            else{
                Alert::alert('Failed!', 'Transaction Failed', 'warning');
                return redirect()->back();
            }
        }
    }
    catch (BalanceIsEmpty $e) {
        DB::rollBack();
        Alert::alert('Failed!', 'You Have Not Any Balance Yet. Please Buy', 'warning');
        return redirect()->back();
    }
    catch (InsufficientFunds $e) {
        DB::rollBack();
        Alert::alert('Failed!', 'Insufficient Balance', 'warning');
        return redirect()->back();
    }
        DB::rollBack();
        Alert::alert('Failed!', 'Transaction Failed', 'warning');
        return redirect()->back();
    }
}
