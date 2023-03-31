<?php

namespace App\Jobs;

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
           $wallet = Wallet::where('meta->ac_keys->id',$data['data']['id'])->first();
           Log::debug($wallet);
           $collection = collect($wallet->meta);
           $merged = $collection->merge([
            'ac_keys' => [
                'id' => $collection['ac_keys']['id'],
                'address' => $data['data']['address']
            ]
             ]);
           $wallet->update(['meta' =>$merged->all()]);
        }

        return response('Success',200);
    }
}
