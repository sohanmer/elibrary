<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use App\Books;
use DB;
use Carbon\Carbon;

class SendReminderMails extends Notification
{
    use Queueable;
    protected $books;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($books)
    {
        $this->books = $books;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $users = User::all();
        foreach($users as $user){
            if($user->hasRole('readers')){
                $newbooks = '';
                foreach($this->books as $book){
                    $newbooks = $newbooks.$book->name;
                }                
            }
        }
        
        return (new MailMessage)
                    ->line('Hey! You have not read any book from past 15 days.')
                    ->line('Here are some newly added books.')
                    ->line($newbooks)
                    ->line('Keep Reading Keep Learning');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
