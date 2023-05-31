<?php

namespace App\Console\Commands;

use App\Helpers\Api;
use App\Models\Market;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class GetMarkets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:market';

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

        $response = Http::withToken(Api::quidax_api_key())->get(Api::quidax_base_url().'markets');
        //Log::debug(json_encode($response->object()));
        $this->info(json_encode($response->object()));
        if($response->successful())
        {
            $result = $response->object();
            if(isset($result->status) && $result->status == 'success')
            {
                foreach ($result->data as $key => $market) {
                    $mk = Market::create([
                        'code' => $market->id,
                        'name' => $market->name,
                        'base_unit' => $market->base_unit,
                        'quote_unit' => $market->quote_unit,
                        //'is_active' => $market->id,
                    ]);
                }

            }
            elseif(isset($result->status) && $result->status == 'error')
            {
                $this->error($result->message);
            }
            else{
                $this->error('Something Went Wrong');
            }
        }
        return Command::SUCCESS;
    }
}
