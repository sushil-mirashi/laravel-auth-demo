<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Authtesting;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        commands\testCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('command:test')->everyMinute()->appendOutputTo('public/testScheduler.txt')
        ->before(function(){
            Log::info('task is about to perform');
        })->onSuccess(function(){
            Log::info('task executed successfully');
        })->onFailure(function(){
            Log::error('task failed successfully');
        })->pingOnSuccess('www.facebook.com');
        // $schedule->call(function(){
        //     DB::table('scheduled_insert')
        //     ->insert([
        //         'Random_string' => Str::random(8),
        //     ]);
        // })->everyMinute()->appendOutputTo('public/testScheduler.txt');
        // $schedule->call('App\Http\Controllers\Authtesting@index')->everyTwoMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
