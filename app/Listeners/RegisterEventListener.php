<?php

namespace App\Listeners;

use App\Events\RegisterEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterEventListener
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
     * @param  RegisterEvent  $event
     * @return void
     */
    public function handle(RegisterEvent $event)
    {
        //check
    }
}
