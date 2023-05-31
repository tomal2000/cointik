<?php

namespace App\Console\Commands;

use App\Helpers\Api;
use App\Models\Market;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class GetMarketTickers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:tickers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $markets = Market::active()->get();

        if($markets)
        {
            foreach ($markets as $key => $market) {

        $response = Http::withToken(Api::quidax_api_key())->get(Api::quidax_base_url().'markets/tickers/'.$market->code);
        //Log::debug(json_encode($response->object()));
        $this->info(json_encode($response->object()));
        if($response->successful())
        {
            $result = $response->object();
            if(isset($result->status) && $result->status == 'success')
            {
                //foreach ($result->data->ticker as $key => $ticker) {
                    $ticker = $result->data->ticker;
                    $market->tickers()->create([
                        'buy' => $ticker->buy,
                        'sell' => $ticker->sell,
                        'low' => $ticker->low,
                        'high' => $ticker->high,
                        'open' => $ticker->open,
                        'vol' => $ticker->vol,
                    ]);
                //}

            }
            elseif(isset($result->status) && $result->status == 'error')
            {
                $this->error($result->message);
            }
            else{
                $this->error('Something Went Wrong');
            }
        }
            }
        }

        return Command::SUCCESS;
    }
}
