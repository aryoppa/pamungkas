<?php

namespace App\Listeners;

use App\Events\CreateUserBalance;
use App\Models\UserBalance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserBalanceListener
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
     * @param  \App\Events\CreateUserBalance  $event
     * @return void
     */
    public function handle(CreateUserBalance $event)
    {
        $user = $event->user;
        UserBalance::create([
            'user_id' => $user->id,
            'is_premium' => 0,
            'balance' => 50000,
        ]);
    }
}
