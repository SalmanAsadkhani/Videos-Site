<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class VerifyEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->onQueue('emails');
    }

    public static function toMailUsing(\Closure $param)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            return $this->markdown('emails.verify')->with([
                'url' => 'http://google.com',
            ]);
    }
}
