<?php
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Todo;
use App\Jobs\SendTodoReminderJob;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Scheduled task for sending reminder emails
Schedule::call(function () {
    $todos = Todo::where('email_sent', false)
                 ->where('due_datetime', '<=', now()->addMinutes(10))
                 ->get();

    foreach ($todos as $todo) {
        SendTodoReminderJob::dispatch($todo);
    }
})->everyMinute();
