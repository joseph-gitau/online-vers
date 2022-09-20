<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contacts extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    public $subject;
    protected $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $subject, $body)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->subject($this->subject)->view('emails.contacts')->with([
            'username' => $this->name,
            'useremail' => $this->email,
            'usersubject' => $this->subject,
            'userbody' => $this->body,
        ]);
    }
}
