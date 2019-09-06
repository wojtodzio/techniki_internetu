<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Checkout extends Mailable
{
    use Queueable, SerializesModels;

    public $items;
    public $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($items, $address)
    {
        $this->items = $items;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.checkout');
    }
}
