<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Genre;
use DB;
use Auth;
use App\Books;
use App\User; 
use carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $books = DB::table('books')->paginate(4);
        $bookGenres = DB::table('books')
                    ->leftJoin('books_genre','books.id','=','books_genre.books_id')
                    ->leftJoin('genres','genre_id','genres.id')->get();
        
        return view('admin.books.bookList')->with('books',Books::all())
                                            ->with('bookGenres',$bookGenres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();

        return view('admin.books.addBooks')->with('genres',$genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateBook();

        if($request->hasFile('thumbnail')){
            $this->validate($request,[
                'thumbnail' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ]);
            $name = $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('images/thumbnails'),$name);
           
        }
        else{
            $name = '';
        }
        $book = Books::create([

            'isbn'=>$request->isbn,
            'name'=>$request->name,
            'author'=>$request->author,
            'length'=>$request->length,
            'edition'=>$request->edition,
            'thumbnail'=>$name

        ]);
        //dd($book);
        $book->genres()->attach($request->genre);
        return redirect(route('books.index'))->with('message', 'Book added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $book)
    {
        return view('admin.books.editBook')
                ->with('book',$book)
                ->with('genres',Genre::all())
                ->with('checkedGenres',$book->genres()->get()->pluck('name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $book)
    {
        $book->genres()->detach();

        if($request->hasFile('thumbnail')){
            
            $this->validate($request,[
                'thumbnail' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ]);
            $name = $request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('images/thumbnails'),$name);
            $book->update([
                'thumbnail' => $name
            ]); 
            $book->update($this->validateBook($name)); 

        }
        else{

            $book->update($this->validateBook()); 

        }
        $book->genres()->attach($request->genre);
              
        
        return redirect(route('books.index'))->with('message', $request->name.' updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {  
        \File::delete(public_path().'/images/thumbnails/'.$book->thumbnail);
        $book->genres()->detach();
        $book->delete();
        
        return redirect(route('books.index'))->with('message', $book->name.' deleted successfully!');
    }
    public function filter(Request $request)
    {
        if(Auth::user()->hasRole('admin')){

            if($request->filter != 'all'){
                $genre = Genre::find($request->filter);
                return view('home')->with('books',$genre->books()->get())
                                    ->with('genres',Genre::all());
            }
            else{
                return view('home')->with('books',Books::all())
                                    ->with('genres',Genre::all());
            }
        }
        else{
            $bookGenres = DB::table('books')
                            ->leftJoin('books_genre','books.id','=','books_genre.books_id')
                            ->leftJoin('genres','genre_id','genres.id')->get();

            if($request->filter != 'all'){
                $genre = Genre::find($request->filter);             
                return view('admin.users.userBook')
                                    ->with('books',$genre->books()->get())
                                    ->with('genres',Genre::all())
                                    ->with('readBooks',Auth::user()->books->pluck('id'))
                                    ->with('bookGenres',$bookGenres)
                                    ->with('message','All '.Genre::find($request->filter)->name.' Books');
            }
            else{
                return view('admin.users.userBook')
                                    ->with('books',Books::all())
                                    ->with('genres',Genre::all())
                                    ->with('readBooks',Auth::user()->books->pluck('id'))
                                    ->with('bookGenres',$bookGenres);
            }
        }
            
    }
    public function validateBook(){

        return request()->validate([

            'isbn'=> 'required|integer',
            'name'=> 'required|max:255',
            'length'=>'required|integer',
            'author'=>'required|max:255',
            'edition'=>'required',    
            
        ]);
    } 
}
