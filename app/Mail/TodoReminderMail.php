<?php
namespace App\Mail;

use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TodoReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $todo;
    public $csvFilePath;

    public function __construct(Todo $todo, $csvFilePath)
    {
        $this->todo = $todo;
        $this->csvFilePath = $csvFilePath;
    }

    public function build()
    {
        return $this->subject('Reminder: Your Todo is Due Soon')
                    ->view('emails.reminder')
                    ->attach($this->csvFilePath);
    }
}
