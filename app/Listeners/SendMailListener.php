<?php

namespace App\Listeners;

use App\Events\BuyItemEvent;
use App\Mail\BuyMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailListener implements ShouldQueue
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
     * @param  BuyItemEvent  $event
     * @return void
     */
    public function handle(BuyItemEvent $event)
    {
        $user = new \stdClass();
        $user->first_name = $event->first_name;
        $user->email = $event->email;
        Mail::queue(new BuyMail($user,$event->cart));
    }
}
