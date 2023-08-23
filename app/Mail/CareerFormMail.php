<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $resume;
    public $letter;
    public $position;

    public function __construct($name, $email, $phone, $resume, $letter, $position)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->resume = $resume;
        $this->letter = $letter;
        $this->position = $position;
    }

    public function build()
    {
        return $this->view('emails.career-form-mail')
                    ->subject('Career Form Submission')
                    ->attach($this->resume);
    }
}
