<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Bus\Queueable;
use Bavix\Wallet\Models\Wallet;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Spatie\WebhookClient\Models\WebhookCall;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as JobsProcessWebhookJob;

class ProcessWebhookJob extends JobsProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(WebhookCall $webhookCall)
    {
        $this->webhookCall = $webhookCall;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $this->webhookCall // contains an instance of `WebhookCall`

        // perform the work here
        Log::debug($this->webhookCall);
        $data = $this->webhookCall['payload'];


        if(isset($data['event']) && $data['event'] == 'wallet.address.generated')
        {
           $wallet = Wallet::where('meta->address->id',$data['data']['id'])->where('meta->address->status','pending')->first();
           if(!$wallet)
           {
                Log::warning('No Wallet Found');
                return response()->json([
                    'status' => 'failed',
                    'message' => 'No Wallet Found'
                ]);
           }
           $collection = collect($wallet->meta);
           $merged = $collection->merge([
                'status' => 'operative',
                'address' => [
                    'status' => 'operative',
                    'address' => $data['data']['address']
                ],
             ]);
           $wallet->update(['meta' =>$merged->all()]);
        }

        if(isset($data['event']) && $data['event'] == 'deposit.transaction.confirmation')
        {
            $user = User::where('user_key',$data['data']['user']['id'])->first();

            if(!$user->hasWallet($data['data']['wallet']['currency']))
            {
                return response('Failed Invalid Wallet',404);
            }

            $wallet = $user->getWallet($data['data']['wallet']['currency']);
            if($data['data']['payment_transaction']['status'] == 'unconfirmed')
            {
                $wallet->depositFloat($data['data']['amount'],[
                    'id' => $data['data']['id'],
                    'method' => 'web',
                    'note' => 'Balance Received',
                    'currency' => $data['data']['currency'],
                    'amount' => $data['data']['amount'],
                    'fee' => $data['data']['fee'],
                    'source_tnx_id' => $data['data']['txid'],
                    'payment_transaction' => $data['data']['payment_transaction'],
                    'status' => $data['data']['payment_transaction']['status'],
                    'transaction' => [
                        'type' => 'received',
                        'deposit_address' => $data['data']['wallet']['deposit_address'],
                        'meta' => null,
                    ]
                ],false);
            }
        }

        if(isset($data['event']) && $data['event'] == 'deposit.successful')
        {
            $user = User::where('user_key',$data['data']['user']['id'])->with('wallet')->first();

            if(!$user->hasWallet($data['data']['wallet']['currency']))
            {
                return response('Failed Invalid Wallet',404);
            }

            $wallet = $user->getWallet($data['data']['wallet']['currency']);
            if($data['data']['payment_transaction']['status'] == 'confirmed')
            {
                $transaction = Transaction::where('meta->id',$data['data']['id'])->first();
                Log::debug($transaction);
                $wallet->confirm($transaction);
            }
        }

        if(isset($data['event']) && $data['event'] == 'instant_order.done')
        {
            // $user = User::where('user_key',$data['data']['user']['id'])->with('wallet')->first();

            // if(!$user->hasWallet($data['data']['wallet']['currency']))
            // {
            //     return response('Failed Invalid Wallet',404);
            // }

            // $wallet = $user->getWallet($data['data']['wallet']['currency']);
            // if($data['data']['payment_transaction']['status'] == 'confirmed')
            // {
            //     $transaction = Transaction::where('meta->id',$data['data']['id'])->first();
            //     Log::debug($transaction);
            //     $wallet->confirm($transaction);
            // }

            $order  = Order::where('tracking_no',$data['data']['id'])->first();
            Wallet::find($order->from_wallet)->withdrawFloat(json_decode($order->total)->amount);
            Wallet::find($order->to_wallet)->depositFloat(json_decode($order->receive)->amount);
        }


        return response('Success',200);
    }
}
