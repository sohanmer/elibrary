<?php

namespace App\Http\Controllers;

use App\Jobs\ReminderMails;
use Auth;
use Illuminate\Http\Request;


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
        //ReminderMails::dispatch();
        if(Auth::user()->hasRole('admin')){
            
            return redirect()->route('admin.index');
        }
        else{
            return redirect(route('userBooks.index'));
        }
    }
}
