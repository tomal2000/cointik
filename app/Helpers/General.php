<?php
namespace App\Helpers;

use App\Models\Currency;
use App\Models\WalletTypeAssign;

class General {

    public static function walletAssign($id)
    {
        $walletAssign = WalletTypeAssign::where('wallet_id',$id)->first();
        if(!$walletAssign)
        {
            return false;
        }
        return $walletAssign;
    }
    // public static function get_currency_by_id($id)
    // {
    //     $currency = Currency::find($id);
    //     if(!$currency)
    //     {
    //         return false;
    //     }
    //     return $currency;
    // }

    // public static function get_currency_by_slug($slug)
    // {
    //     $currency = Currency::where('code',$slug)->first();
    //     if(!$currency)
    //     {
    //         return false;
    //     }
    //     return $currency;
    // }
}
