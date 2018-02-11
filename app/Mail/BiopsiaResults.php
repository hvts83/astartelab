<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Biopsia;

class BiopsiaResults extends Mailable
{
    use Queueable, SerializesModels;

    public $biopsia;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Biopsia $biopsia)
    {
         $this->biopsia = $biopsia;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.biopsia');
    }
}
