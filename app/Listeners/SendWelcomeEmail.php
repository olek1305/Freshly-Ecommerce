<?php

namespace App\Listeners;

use App\Events\UserRegisterd;
use App\Mail\WelcomeEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisterd $event): void
    {
        Mail::send(new WelcomeEmail($event->email));
    }
}
