<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\SendReminderMails;
use Carbon\Carbon;
use App\User;
use App\books;

class ReminderMails implements ShouldQueue
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
            if($user->hasRole('readers')){
                $updatedAt = $user->books()->orderBy('updated_at')->first();
                $lastTime = Carbon::parse($updatedAt['updated_at']);
                $presentTime= Carbon::now();
                $diff = $presentTime->diffInMinutes($lastTime);
                $dateE = Carbon::now();
                $books = Books::whereBetween('created_at',[$lastTime->format('Y-m-d')." 00:00:00", $dateE])->get();
                if($diff >= 0 )
                {
                    $user->books()->update([
                        'updated_at'=> Carbon::now()
                        ]);
                        $user->notify(new SendReminderMails($books));
                    
                    
                }
            }
        }
    }
}
