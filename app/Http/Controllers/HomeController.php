<?php

namespace App\Http\Controllers;

use App\Jobs\WeeklyMails;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // $users=User::all();
        // foreach($users as $user){
        //     $lastTime = $user->books()->where('books_user.created_at','>=',Carbon::now()->subDays(7))->get();
        //     //$user->notify(new SendWeeklyMails($lastTime));
        //     $books = '';
        // foreach($lastTime as $book){
        //     $books = $books.$book->name.", "; 
        // }
        // dd($books);
        // }
        
        
        WeeklyMails::dispatch();
        if(Auth::user()->hasRole('admin')){
            return redirect(route('books.index'));
        }
        else{
            return redirect(route('userBooks.index'));
        }
    }
}
