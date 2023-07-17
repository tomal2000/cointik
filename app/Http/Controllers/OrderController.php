<?php

namespace App\Http\Controllers;

use App\Helpers\Api;
use App\Models\Order;
use App\Models\Market;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Exceptions\InsufficientFunds;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $from_wallets = $user->wallets->whereIn('slug',['ngn']);
        $to_wallets = $user->wallets->whereNotIn('slug',['ngn']);
        return view('user.order.index',compact('from_wallets','to_wallets'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $from = Wallet::find($request->from);
        $to = Wallet::find($request->to);
        $market = Market::where('code',$to->slug.$from->slug)->first();

        if($request->side == 'buy')
        {
            $json =[
            'bid' => $from->slug,
            'ask' => $to->slug,
            'type' => $request->side,
            'total' => $request->amount,
            'unit' => $from->slug,
        ];
        }
        else{
            $json =[
                'bid' => $from->slug,
                'ask' => $to->slug,
                'type' => $request->side,
                'volume' => $request->amount,
                'unit' => $to->slug,
            ];
        }
       $response = Http::withToken(Api::quidax_api_key())->post(Api::quidax_base_url().'users/me/instant_orders',$json);

        if($response->successful())
        {
            $result = $response->object();
            if(isset($result->status) && $result->status == 'success')
            {
                $order = $user->order()->create([
                    'from_wallet' => $from->id,
                    'to_wallet' => $to->id,
                    'market_id' =>  $market->id,
                    'type' => $request->type,
                    'department' => $request->department,
                    'side' => $request->side,
                    'tracking_no' => $result->data->id,
                    'price' => json_encode($result->data->price),
                    'volume' => json_encode($result->data->volume),
                    'total' => json_encode($result->data->total),
                    'fee' => json_encode($result->data->fee),
                    'receive' => json_encode($result->data->receive),
                    'initiator_payload' => json_encode($result),
                    'status' => 'pending',
                ]);
            return view('user.order.confirmation',compact('order'));
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
        else{
            Alert::alert('Error!', 'Something went wrong', 'error');
            return redirect()->back();
        }
    }

    public function confirm(Request $request)
    {
        $order = Order::find($request->id);
        if(isset($request->type) && $request->type == 'requote')
        {

           $order->update([
                'status' => 'need_requote'
            ]);

            return view('user.order.requote',compact('order'));
        }
        elseif(isset($request->type) && $request->type == 'requote_confirm')
        {
          $response = Http::withToken(Api::quidax_api_key())->post(Api::quidax_base_url().'users/me/instant_orders/'. $order->tracking_no.'/requote');
            if($response->successful())
            {
                $result = $response->object();

                if(isset($result->status) && $result->status == 'success')
                {
                    $order->update([
                        'price' => json_encode($result->data->price),
                        'volume' => json_encode($result->data->volume),
                        'total' => json_encode($result->data->total),
                        'fee' => json_encode($result->data->fee),
                        'receive' => json_encode($result->data->receive),
                        'initiator_payload' => json_encode($result),
                        'status' => 'pending',
                    ]);
                    $order = Order::find($order->id);
                    return view('user.order.confirmation',compact('order'));
                }
                elseif(isset($result->status) && $result->status == 'error')
                {
                    Alert::alert('Failed!', $result->message, 'warning');
                    return redirect()->back();
                }

                else{
                    Alert::alert('Failed!', 'Transaction Failed', 'warning');
                    return redirect()->back();
                }
            }
        }



        try {
            Wallet::find($order->from_wallet)->withdrawFloat(json_decode($order->total)->amount);
        }  catch (BalanceIsEmpty $e) {
            Alert::alert('Failed!', 'You Have Not Any Balance Yet. Please Buy', 'warning');
            return redirect()->back();
        }
        catch (InsufficientFunds $e) {
            Alert::alert('Failed!', 'Insufficient Balance', 'warning');
            return redirect()->back();
        }

        $response = Http::withToken(Api::quidax_api_key())->post(Api::quidax_base_url().'users/me/instant_orders/'. $order->tracking_no.'/confirm');
        $data = $response->object();
        if($response->successful())
        {


            if(isset($data->status) && $data->status == 'success')
            {
                Alert::alert('Success!', 'Request Successful', 'success');
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
        else{
            Alert::alert('Failed!', $data->message ?? 'SOmething Went Wrong', 'warning');
            return redirect()->back();
        }
    }
}
