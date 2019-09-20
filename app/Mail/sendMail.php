<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        //$this->pdf = base64_encode($pdf);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*return $this->from('noreply.onlineinvoice@gmail.com')->subject('Invoice from ')->view('page.portal.user.email')->with('data',$this->data);*/

         /*  return $this->from('noreply.onlineinvoice@gmail.com')->subject('Invoice from ')->attachData(base64_decode($this->pdf), 'document.pdf', [
                'mime' => 'application/pdf',
            ]);*/
        
        return $this->from('noreply.onlineinvoice@gmail.com')
        ->subject('New')
        ->view('page.portal.user.email')
        ->with('data',$this->data)
        ->attach('./pdf/invoice.pdf');

     

    }
}
