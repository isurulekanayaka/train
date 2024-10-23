<?php

namespace App\Mail;

use App\Models\PaymentDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentDetailsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $paymentDetail;
    public $lat;
    public $long;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\PaymentDetail  $paymentDetail
     * @param  string  $lat
     * @param  string  $long
     * @return void
     */
    public function __construct(PaymentDetail $paymentDetail, $lat, $long)
    {
        $this->paymentDetail = $paymentDetail;
        $this->lat = $lat;
        $this->long = $long;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))  // Uses the sender email from .env
                    ->subject('Your Payment Details')
                    ->view('emails.payment_details')  // Points to the email template
                    ->with([
                        'paymentDetail' => $this->paymentDetail,
                        'lat' => $this->lat,
                        'long' => $this->long,
                    ]);
    }
}
