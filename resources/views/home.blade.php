@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header row">
                    <div class="col col-md-8">
                        <h3>Available Books</h3>
                    </div>
                    <div class=" form-group col-md-3">
                        <form action="/filter" method="GET" >
                            <div class="row">
                                <div class="col-md-8">
                                    <select class="form-control" name="filter">
                                        <option value="all"> All</option>
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" value="Filter" class="btn btn-primary">
                                </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">                        
                        @foreach($books as $book)
                            <div class="col-sm-3 book pb-3">
                                <div class="card h-100 border border-success" data-toggle="tooltip" data-placement="bottom" title="Edition:{{$book->edition}}  Length:{{$book->length}}">
                                    <img src="{{asset('storage/thumbnails/'.$book->thumbnail)}}" class="img-fluid img-thumbnail" alt="..." style="height:10rem">
                                    <div class="card-body" >
                                    <h5 class="card-title">{{$book->name}}</h5>
                                    <p class="card-text">Author(s):{{$book->author}}</p>
                                    @can('manage-books')
                                    <div class="row">                                                                                                  
                                        <div class="col">
                                            <a href="{{route('books.edit',$book->id)}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        </div>
                                        <div class="col">
                                            <form action="{{route('books.destroy',$book->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        </div> 
                                    </div>
                                    @endcan
                                    </div>
                                </div>
                            </div>
                        @endforeach                           
                    </div>
                    <div class="pagination">
                        <div> {{$books->links()}} </div>
                    </div>                
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
