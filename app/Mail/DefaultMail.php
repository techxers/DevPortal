<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;


class DefaultMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data,$user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param $data
     */
    public function __construct(User $user,$data)
    {
        $this->data=$data;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data["from"])
            ->subject($this->data["subject"])
            ->view('emails.default');
    }
}
