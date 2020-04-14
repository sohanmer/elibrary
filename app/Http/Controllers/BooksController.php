<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Genre;
use DB;
use Auth;
use App\Books;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books')->paginate(4);
        return view('home')->with('books',$books)
                           ->with('genres',Genre::all());
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
        
        if($request->hasFile('thumbnail')){
            $this->validate($request,[
                'thumbnail' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ]);
            $name = $request->thumbnail->getClientOriginalName();
            $path = $request->file('thumbnail')->storeAs(
                'public/thumbnails', $name
            );
           
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
        return redirect('home');
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
        $genres = Genre::all();
        return view('admin.books.editBook')
                ->with('book',$book)
                ->with('genres',$genres)
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
           // Storage::delete(asset('storage/thumbnails/'.$book->thumbnail));
            $this->validate($request,[
                'thumbnail' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ]);
            $name = $request->thumbnail->getClientOriginalName();
            $path = $request->file('thumbnail')->storeAs(
                'public/thumbnails', $name
            );
           
        }
        else{
            $name = $book->thumbnail;
        }
        $book->update([
            'isbn'=>$request->isbn,
            'name'=>$request->name,
            'author'=>$request->author,
            'length'=>$request->length,
            'edition'=>$request->edition,
            'thumbnail'=>$name
        ]);
        $book->genres()->attach($request->genre);
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {   
        $book->genres()->detach();
        $book->delete();
        
        return redirect('home');
    }
    public function filter(Request $request)
    {
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
}
