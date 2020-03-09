<?php

namespace App\Mail;

use App\Appointment;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($this->data['from'], $this->data['from_name'])
            ->subject(str_replace(["%firstname","%lastname", "%date"],[(explode(".", $this->data['visitor_name'])[0]),(explode(".",$this->data['visitor_name'])[1]),  date_format(date_create($this->data['dateTime']), 'l jS F Y')], $this->data['subject']))
            ->view('emails.notification');
    }
}
