<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrainNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $trainDetails;

    public function __construct($trainDetails)
    {
        $this->trainDetails = $trainDetails; // Corrected this line
    }

    public function build()
    {
        return $this->subject('Train Notification')
                    ->view('emails.train_notification')
                    ->with('trainDetails', $this->trainDetails); // Ensure the variable is passed correctly
    }
}
