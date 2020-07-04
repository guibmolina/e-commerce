<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use stdClass;

class BuyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var stdClass
     */
    private $user;
    private $cart;

    /**
     * Create a new message instance.
     *
     * @param stdClass $user
     * @param $cart
     */
    public function __construct(stdClass $user, $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Confirmação de compra');
        $this->to($this->user);
        return $this->view('mail.buyMail',[
            'cart' => $this->cart
        ]);
    }
}
