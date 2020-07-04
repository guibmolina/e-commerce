<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BuyItemEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $first_name;
    public $email;
    public $cart;

    /**
     * Create a new event instance.
     *
     * @param $first_name
     * @param $email
     * @param $cart
     */
    public function __construct($first_name, $email, $cart)
    {
        $this->first_name = $first_name;
        $this->email = $email;
        $this->cart = $cart;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
