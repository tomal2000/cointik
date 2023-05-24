<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BeneficiaryController extends Controller
{
    public function create(Request $request)
    {
       $data = $request->validate([
            'wallet_id' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'display_name' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();
        $user->beneficiaries()->create([
            'wallet_id' => $request->wallet_id,
            'address' => $request->address,
            'display_name' => $request->display_name,
        ]);
        Alert::alert('Success!', 'Beneficiary Create Successfully.', 'success');
        return redirect()->back();
    }


    // public function get_by_currency($currency_id)
    // {
    //     $beneficiary['data'] = Beneficiary::where('currency_id',$currency_id)->get();

    //     return response()->json($beneficiary);
    // }

    public function userWalletBeneficiaries($wallet_id)
    {
        $user = Auth::user();
        $beneficiary['data'] = $user->beneficiaries->where('wallet_id',$wallet_id);
        return response()->json($beneficiary);
    }
}
