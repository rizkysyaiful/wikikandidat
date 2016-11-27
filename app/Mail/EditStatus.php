<?php

namespace App\Mail;

use App\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EditStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;
    public $is_edited;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($is_edited, Submission $submission)
    {
        $this->is_edited = $is_edited;
        $this->submission = $submission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.edit-status')
                    ->subject('Status "'.substr($this->submission->text, 0, 50).'..."');
    }
}
