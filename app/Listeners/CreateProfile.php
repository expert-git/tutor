<?php

namespace App\Listeners;

use App\Events\UserRegistration;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Profile;

class CreateProfile
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
        $p = new Profile();
         

        $p->user_id = $event->data['user']->id;

        if(!empty($event->data['request']['bio']))
        {
            $p->bio = $event->data['request']['bio'];    
        }
        if(!empty($event->data['user']->email))
        {
            $p->username = $event->data['user']->email;    
        }
        if(!empty($event->data['request']['tution_per_hour']))
        {
            $p->tution_per_hour = $event->data['request']['tution_per_hour'];               
        }
        if(!empty($event->data['request']['gender']))
        {
            $p->gender = $event->data['request']['gender'];    
        }
        if(!empty($event->data['request']['age']))
        {
            $p->age = $event->data['request']['age'];    
        }
        if(!empty($event->data['request']['qualifications']))
        {
            $p->qualifications = $event->data['request']['qualifications'];    
        }
        if(!empty($event->data['request']['qualification_from']))
        {
            $p->qualification_from = $event->data['request']['qualification_from'];    
        }
        if(!empty($event->data['request']['address']))
        {
            $p->address = $event->data['request']['address'];
        }
        if(!empty($event->data['request']['zipcode']))
        {
            $p->zipcode = $event->data['request']['zipcode'];    
        }
        if(!empty($event->data['request']['state']))
        {
            $p->state = $event->data['request']['state'];
        }
        if(!empty($event->data['request']['country']))
        {
            $p->country = $event->data['request']['country'];
        }
        // dd($p);
        $p->save();
    }
}
