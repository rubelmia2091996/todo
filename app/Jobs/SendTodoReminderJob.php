<?php
namespace App\Jobs;

use App\Mail\TodoReminderMail;
use App\Models\Todo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class SendTodoReminderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }
    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $collection = collect($response->json())->take(10)->pluck('title');

        $csvFileName = 'todos/' . time().mt_rand().'titles.csv';
        $handle = fopen(Storage::path($csvFileName), 'w');

        fputcsv($handle, ['ID', 'Title']);
        foreach ($collection as $key => $value) {
            fputcsv($handle, [$key + 1, $value]);
        }
        fclose($handle);

        $fullPath = storage_path("app/todos/".$csvFileName);
        Mail::to('rubelmia2091997@gmail.com')->send(new TodoReminderMail($this->todo, $fullPath));
        $this->todo->update(['email_sent' => true]);
    }

    

}
