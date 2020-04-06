<?php

namespace App\Http\Controllers;

use App\UserBook;
use Illuminate\Http\Request;
use App\Books;
use Auth;

class UserBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.userBook')
                ->with('books',Books::all())
                ->with('readBooks',Auth::user()->books->pluck('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserBook  $userBook
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.readBooks')
                    ->with('books',Books::all())
                    ->with('readBooks',Auth::user()->books->pluck('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserBook  $userBook
     * @return \Illuminate\Http\Response
     */
    public function edit(UserBook $userBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserBook  $userBook
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
            $book = Books::find($id);
            $user_id = Auth::user()->id;
            $book->user()->attach($user_id);
        
            $user = Auth::user();

        
        return view('admin.users.userBook')
                ->with('readBooks',$user->books->pluck('id'))
                ->with('books',Books::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserBook  $userBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Books::find($id);
            $user_id = Auth::user()->id;
            $book->user()->detach($user_id);
        
            $user = Auth::user();
        
        return view('admin.users.userBook')
                ->with('readBooks',$user->books->pluck('id'))
                ->with('books',Books::all());
    }
}
