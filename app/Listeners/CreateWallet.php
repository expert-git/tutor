<?php

namespace App\Listeners;

use App\Events\UserRegistration;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Wallet;

class CreateWallet
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
     * @param  UserRegistration  $event
     * @return void
     */
    public function handle(UserRegistration $event)
    {
        //

        $w = new Wallet();

        $w->user_id = $event->data['user']->id;

        $w->save();
    }
}
