<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
Use App\User;
use App\Notifications\SendWeeklyMails;
use Carbon\Carbon;

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
            $lastTime = $user->books()->where('books_user.created_at','>=',Carbon::now()->subDays(7))->get();
            if(!($lastTime->isEmpty()))
            {
                $user->notify(new SendWeeklyMails($lastTime));
            }
        }
    }
}
