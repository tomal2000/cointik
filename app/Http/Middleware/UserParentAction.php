<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\WalletType;
use Illuminate\Http\Request;

class UserParentAction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
      // $user->dd();
        $walletType = WalletType::primary()->first();
        if(!$user->hasWallet($walletType->code))
        {
            $wallet = $user->createWallet([
                'name' => $walletType->display_name,
                'slug' => $walletType->code,
                'description' => 'This Is A System Wallet For NGN Currency',
                'meta' => [
                    'id' => null,
                    'address' => null,
                    'type' => 'local',
                    'decimal_places' => $walletType->allow_decimal,
                    'wallet_type' => $walletType,
                ]
            ]);

            $walletType->user_assign()->create([
                'wallet_id' => $wallet->id
            ]);
        }
        return $next($request);
    }
}
