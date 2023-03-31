<?php

namespace App\Http\Controllers;

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
        $wallets = Auth::user()->wallets->where('slug','!=','system');
        return view('user.wallet.index',compact('wallets'));
   }

    public function create(Request $request)
    {
        $request->validate([
            'currency' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();
        //return ;
        if($user->hasWallet($request->currency))
       {
            Alert::alert('Warning!', 'You Cane Create Same Type Of Account At Once', 'warning');
            return redirect()->back();
       }



        $response = Http::withToken('xmHirkfXxMLgWOx8YnIXvBqO91c7UL9ju88NFDWK')->post('https://www.quidax.com/api/v1/users/'.$user->user_key.'/wallets/'.$request->currency.'/addresses');
        Log::debug(json_encode($response->object()));
        if($response->successful())
        {
            $result = $response->object();
            if(isset($result->status) && $result->status == 'success')
            {
                $wallet = $user->createWallet([
                    'name' => Str::upper($request->currency),
                    'slug' => $request->currency,
                    'decimal_places' => 8,
                    'meta' => [
                        'type' => 'crypto',
                        'user' => 'general',
                        'decimal_places' => 8,
                        'ac_keys' => [
                            'id' => $result->data->id,
                            'address' => null,
                        ]
                    ],
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
