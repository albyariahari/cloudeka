<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactUsNotification extends Mailable {
    use Queueable, SerializesModels;
	
	private $__data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data) {
        $this->__data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
		$this->subject($this->__data['subject']);
		
        $this->from($this->__data['from']);
		
		$this->to(explode(';', $this->__data['to']));
		
		if (isset($this->__data['cc']) && !empty($this->__data['cc']))
			$this->cc(explode(';', $this->__data['cc']));
		
		if (isset($this->__data['bcc']) && !empty($this->__data['bcc']))
			$this->bcc(explode(';', $this->__data['bcc']));
		
		return $this->view('admin/message/mail', ['data' => $this->__data['data']]);
    }
}