<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WalletType;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Lwwcas\LaravelCountries\Models\Country;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $countries = Country::whereIso('NG')->get();
        return view('auth.register',compact('countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'phone_country_code' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'phone_country_code' => $request->phone_country_code,
            'lc_country_id' => '37',
            'password' => Hash::make($request->password),
        ]);
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

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
