<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
Use App\User;
use App\Notifications\SendWeeklyMails;

class WeeklyMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::all();
        
        foreach($users as $user){
            $lastTime = $user->books()->where('created_at','>=',DATEADD(day,-7,GETDATE()))->get();
            dd($lastTime);
            // if($lastTime){
            //     $user->notify(new SendWeeklyMails($lastTime));        
            // }
        $user->notify(new SendWeeklyMails($lastTime));
        }
    }
}
