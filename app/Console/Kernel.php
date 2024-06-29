<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Schedule as TaskSchedule; // Ensure you have imported the correct model
use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $tasks = TaskSchedule::all();

        foreach ($tasks as $task) {
            
            Log::info("Forni boshlash: {$task->id} with params: {$task->params}");

            if (is_string($task->params)) {

                $params = $task->params;
                $params = explode(",", $task->params);
                Log::info("Qanaqa ko'rinishda params: " . json_encode($params));

                if (is_array($params)) {
                    if (!empty($task->send_day)) {
                        $day_time = $task->send_day . "," . $task->params;
                        $params = explode(",", $day_time);
                        Log::info("Qanaqa ko'rinishda day time params: " . json_encode($params));
                    }

                    $schedule->call(function () use ($task) {
                        Log::info("{$task->message} Salom " . now());
                    })->{$task->frequency}(...$params)->name($task->message);
                } else {
                    Log::error("bu vazifani bajarib bo'lmadi: {$task->id}");
                }
            } else {
                Log::error("{$task->id} Shu id ma'lumotlari string emas");
            }
        }
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
