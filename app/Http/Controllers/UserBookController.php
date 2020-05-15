<?php

namespace App\Http\Controllers;

use App\UserBook;
use Illuminate\Http\Request;
use App\Books;
use Auth;
use App\Genre;
use DB;

class UserBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    
    public function index()
    {
        // $books = DB::table('books')->paginate(12);
        //$books = Books::all();
        $bookGenres = DB::table('books')
                    ->leftJoin('books_genre','books.id','=','books_genre.books_id')
                    ->leftJoin('genres','genre_id','genres.id')->get();
                    
        return view('admin.users.userBook')
                ->with('books',Books::all())
                ->with('readBooks',Auth::user()->books->pluck('id'))
                ->with('genres',Genre::all())
                ->with('bookGenres',$bookGenres);                                

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
        $bookGenres = DB::table('books')
                    ->leftJoin('books_genre','books.id','=','books_genre.books_id')
                    ->leftJoin('genres','genre_id','genres.id')->get();
        if($id==1){
            return view('admin.users.readBooks')
                    ->with('books',Books::all())
                    ->with('readBooks',Auth::user()->books->pluck('id'))
                    ->with('message','Books You Already Read')
                    ->with('status', 'read')
                    ->with('bookGenres',$bookGenres);
        }
        else{
            $books = Books::all();
            $unread = $books->reject(function($book){
                $reads = Auth::user()->books()->get();
                foreach($reads as $read){
                    if($book->id == $read->id)
                        return true;                
                    }
                        return false;
            });
           
            return view('admin.users.readBooks')
                    ->with('books',Books::all())
                    ->with('readBooks',$unread->pluck('id'))
                    ->with('message','Books You Have Not Read')
                    ->with('status','unread')
                    ->with('bookGenres',$bookGenres);
        }
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
        $user = Auth::user();
        if(!($book->user()->where('books_id',$id)->exists())){
            $book->user()->attach($user->id);
        }
        else{
            $book->user()->detach($user->id);
        }
        $user = Auth::user();
        $bookGenres = DB::table('books')
        ->leftJoin('books_genre','books.id','=','books_genre.books_id')
        ->leftJoin('genres','genre_id','genres.id')->get();
    
        return view('admin.users.userBook')
                ->with('readBooks',$user->books->pluck('id'))
                ->with('books',Books::all())
                ->with('genres',Genre::all())
                ->with('bookGenres',$bookGenres);
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
                ->with('books',Books::all())
                ->with('genres',Genre::all());
    }
}
