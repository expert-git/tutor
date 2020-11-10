<?php
namespace App\Listeners;

use App\Events\Job_request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Job_request_listener
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
     * @param  Job_request  $event
     * @return void
     */
    public function handle(Job_request $event)
    {   
       //dd($event->data['request']);
        
    }
}
