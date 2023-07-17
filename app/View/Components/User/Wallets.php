<?php

namespace App\View\Components\User;

use App\Models\Wallet;
use App\Models\WalletType;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Wallets extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $wallets = Auth::user()->wallets;
        $walletsTypes = WalletType::all();
        return view('components.user.wallets',compact('wallets','walletsTypes'));
    }
}
