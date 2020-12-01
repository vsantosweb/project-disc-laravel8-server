<?php

namespace App\Mail\Disc;

use App\Models\Customer\Customer;
use App\Models\Customer\CustomerDiscSession;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDiscTest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $customer;
    protected $session;

    public function __construct($customer)
    {
       $this->customer = $customer;
       $this->session = $customer->session;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $hashUrl = env('APP_URL') .DIRECTORY_SEPARATOR.'authDisc'. DIRECTORY_SEPARATOR.$this->session->token. DIRECTORY_SEPARATOR . $this->customer->uuid;
        return $this->subject('Avaliação DISC')->view('mails.disc.sendDiscTestMail', ['customer'=> $this->customer, 'hashURL' => $hashUrl]);
    }
}
