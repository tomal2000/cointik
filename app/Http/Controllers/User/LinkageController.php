<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LinkageController extends Controller
{
    public function index()
    {
       return view('user.linkage.ok2pay');
    }

    public function ok2pay_view()
    {
        $user = Auth::user();
        $request_id = (string) Str::uuid();
        $user->deposit_account()->create([
            'request_id' => $request_id,
            'provider' => 'ok2pay',
        ]);
        $response = Http::withToken('89|6S916RGe7RutDCK9YnCyjumrmK1DRYhU4QUX4HLPYou')->post('http://127.0.0.1:8090/api/linkage/account/link/create', [
            'request_id' => $request_id,
            'callback_url' => 'http://127.0.0.1:8090/dashboard',
        ]);
        if($response->successful())
        {
           $result = $response->object();
           if(isset($result->status) && $result->status == 'success')
           {
                 return redirect()->away($result->url);
           }
           return 'error1';
        }
        return 'error2';
    }

        public function linkage_status(Request $request)
        {
            $status = $request->query('status');
            $request_id = $request->query('request_id');
            $account_no = $request->query('account_no');
            $name = $request->query('name');
            if($status != null && $status === 'success')
            {

            }
        }
}
