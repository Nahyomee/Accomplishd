<?php

namespace App\Console;

use App\Models\Task;
use App\Notifications\TaskDueNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Notification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(){
            $tasks = Task::overdue()->where('status', 'pending')->get();
            foreach($tasks as $task){
                $notification = [
                    'title' => "Task Overdue",
                    'description' => "$task->title is overdue"
                ];
                Notification::send($task->user, new TaskDueNotification($notification));
            }
            $today = Task::today()->where('status', 'pending')->get();
            foreach($today as $task){
                $notification = [
                    'title' => "Task Due",
                    'description' => "$task->title is due today"
                ];
                Notification::send($task->user, new TaskDueNotification($notification));
            }
        })->everyFifteenMinutes();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
