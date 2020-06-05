<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;
use App\Email;
use Auth;

class SendMailuser extends Mailable
{
    use Queueable, SerializesModels;

    public $dados;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Email $email)
    {
        $this->dados = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Auth::user()->email)
                ->subject($this->dados->assunto)
                ->view('emails.test')
                ->attach(storage_path('app/default.png'))
                ->with([
                    'email' => $this->dados,
                ]);
    }
}
