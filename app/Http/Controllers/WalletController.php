<?php

namespace App\Http\Controllers;

use App\Helpers\Api;
use App\Helpers\General;
use App\Models\Currency;
use App\Models\WalletType;
use Bavix\Wallet\Models\Wallet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class WalletController extends Controller
{
   public function index()
   {
        // $availableWallets = WalletType::crypto()->get();
        // $wallets = Auth::user()->wallets->where('slug','!=','ngn');
        //$wallets = Auth::user()->wallets;
        return view('user.wallet.index');
   }

    public function create(Request $request)
    {
        $request->validate([
            'wallet_type' => ['required', 'integer'],
        ]);

        $user = Auth::user();
        $walletType = WalletType::availablecrypto($request->wallet_type)->first();
        if(!$walletType)
        {
            Alert::alert('Warning!', 'Invalid wallet', 'warning');
            return redirect()->back();
        }

        // if($user->hasWallet($availableCrypto->code))
        // {
        //         Alert::alert('Warning!', 'You Cane Create Same Type Of Account At Once', 'warning');
        //         return redirect()->back();
        // }
        $response = Http::withToken(Api::quidax_api_key())->post(Api::quidax_base_url().'users/me/wallets/'.$walletType->currency_code.'/addresses');
        Log::debug(json_encode($response->object()));
        if($response->successful())
        {
           $result = $response->object();
            if(isset($result->status) && $result->status == 'success')
            {
                $walletType->wallets()->create([
                    'wallet_no' => Str::random(),
                    'user_id' => $user->id,
                    'address_id' => $result->data->id,
                    'address' => null,
                    //'balance',
                    //'meta',
                    //'status',
                ]);
                Alert::alert('Success!', 'Wallet Create Successfully.Please Wait A Little Bit If Address Is Not Generate', 'success');
                return redirect()->back();
            }
            elseif(isset($result->status) && $result->status == 'error')
            {
                Alert::alert('Warning!', $result->message, 'warning');
                return redirect()->back();
            }
            else{
                Alert::alert('Error!', 'Something went wrong', 'error');
                return redirect()->back();
            }
        }
        Alert::alert('Error!', 'Something went wrong', 'error');
        return redirect()->back();
    }
}
