<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrdersReportEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The demo object instance.
     *
     * @var $currentData
     */
    public $currentData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($currentData)
    {
        $this->currentData = $currentData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM', 'konstantin.mrlens@gmail.com'))
            ->view('mails.send_orders')
            ->with(
                [
                    'data' => $this->currentData,
                ]);
    }
}
