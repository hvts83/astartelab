<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Citologia;

class CitologiaResults extends Mailable
{
    use Queueable, SerializesModels;

    public $citologia;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Citologia $citologia)
    {
         $this->citologia = $citologia;
    }



    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.citologia');
    }
}
