<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateApiUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //Log::debug($event->user->id);

        // try {
        //     $response = Http::withToken('xmHirkfXxMLgWOx8YnIXvBqO91c7UL9ju88NFDWK')->post('https://www.quidax.com/api/v1/users',[
        //         'email' => $event->user->email,
        //         'first_name' => $event->user->first_name,
        //         'last_name' => $event->user->last_name,
        //         'phone_number' => $event->user->phone,
        //     ]);
        //     Log::debug(json_encode($response->object()));
        //     if($response->successful())
        //     {
        //         $result = $response->object();
        //         if($result->status == 'success')
        //         {
        //             User::find($event->user->id)->update([
        //                 'user_key' => $result->data->id,
        //             ]);
        //             Log::debug('success');
        //         }
        //     }
        // } catch (\Exception $e) {
        //     Log::debug($e->getMessage());
        // }
    }
}
