@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div>
                <div class="card-header row" >
                    <div class="col col-md-8">
                        @php
                            $temp=0
                        @endphp
                        @isset($message)
                            @php
                                $temp=1
                            @endphp
                        @endisset
                        @if($temp == 1)
                            <h3 class="font-weight-bolder text-primary">{{$message}}</h3> 
                        @else
                            <h3 class="font-weight-bolder text-primary">All Books</h3>                                               
                        @endif                        
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
                                <button type="submit" value="Filter" class="btn btn-primary">Search</button>
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
                    {{-- <div class="row">                        
                        @foreach($books as $book)
                        <div class="col-sm-1 col-md-2 book pb-3">
                            <div class="card h-100 border border-success">
                                <img src="{{asset('storage/thumbnails/'.$book->thumbnail)}}"
                                 class="img-fluid img-thumbnail" 
                                alt="{{$book->name}}" style="height:10rem">
                                <div class="card-body" >
                                        <h5 class="card-title">
                                            <b>{{ \Illuminate\Support\Str::limit($book->name, 15, $end='...') }}</b>
                                        </h5>
                                        <p class="card-text">
                                            <b>{{ \Illuminate\Support\Str::limit($book->author, 20, $end='...') }}</b>
                                        </p>
                                    @can('read-books')
                                    <div class="container-fluid">                                                                                                  
                                       <div class="row"> 
                                           @php
                                                $flag = 0;
                                            @endphp
                                            @isset($readBooks)
                                                @foreach($readBooks as $readBook)
                                                    @if($book->id == $readBook)
                                                        @php 
                                                            $flag = 1;
                                                        @endphp
                                                        @break
                                                    @else
                                                        @php
                                                            $flag = 0;   
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endisset
                                            @if($flag != 1)
                                                <div class="col align-items-center">
                                                    <form action="{{route('userBooks.update',$book->id)}}" 
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="submit" 
                                                        class= "btn btn-primary align-self-center" 
                                                        value="Mark as Read">
                                                    </form>
                                                </div>
                                            @else
                                                <div class="col align-items-center">
                                                    <form action="{{route('userBooks.destroy',$book->id)}}"
                                                         method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" class= "btn btn-danger" 
                                                        value="Mark as Unread">
                                                    </form>
                                                </div>
                                            @endif                                           
                                       </div>
                                    </div>
                                    @endcan
                                    </div>
                                </div>
                            </div>
                        @endforeach   
                    </div> --}}
                    {{-- <div class="pagination">
                        <div> {{$books->links()}} </div>
                    </div>         --}}
                    <div class="container mt-2">
                        <div class="row">
                            @foreach($books as $book)
                                <div class="col-md-3 col-sm-6 pb-4">
                                    <div class="card card-block h-100"  style="position:relative">
                                        <img src="{{asset('images/thumbnails/'.$book->thumbnail)}}" alt="{{$book->name}}" style="padding: 10px 15px 0px 15px">
                                        <div class="card-body text-primary">
                                            <h5 class="card-title ">
                                                <b class="">{{ \Illuminate\Support\Str::limit($book->name, 20, $end='...') }}</b>
                                            </h5>
                                            <p class="card-text" >
                                                <b>{{ \Illuminate\Support\Str::limit($book->author, 20, $end='...') }}</b><br/>
                                                @foreach ($bookGenres as $bookGenre)
                                                    @if ($bookGenre->books_id == $book->id)
                                                        <span class="badge badge-warning">{{$bookGenre->name}}</span>
                                                    @endif                                                
                                                @endforeach                                            
                                            </p>
                                            <div class="row justify-content-md-center">
                                                @can('read-books')
                                                    @php
                                                        $flag = 0;
                                                    @endphp
                                                    @isset($readBooks)
                                                        @foreach($readBooks as $readBook)
                                                            @if($book->id == $readBook)
                                                                @php 
                                                                    $flag = 1;
                                                                @endphp
                                                                @break
                                                            @else
                                                                @php
                                                                    $flag = 0;   
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                    @if($flag != 1)
                                                        <div class="justify-content-md-center">
                                                            <div style="position:absolute;left:50%;bottom:1em;transform:translateX(-50%)">
                                                                <form action="{{route('userBooks.update',$book->id)}}" 
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="submit" 
                                                                    class= "btn btn-success align-self-center" 
                                                                    value="Already Read" >
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="justify-content-md-center">
                                                            <div style="position:absolute;left:50%;bottom:1em;transform:translateX(-50%)">
                                                                <form action="{{route('userBooks.destroy',$book->id)}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <input type="submit" class= "btn btn-primary" 
                                                                    value="Mark as Unread">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif                                                                                               
                                                @endcan                                                
                                            </div>
                                        </div>                       
                                    </div>
                                </div>
                            @endforeach
                        </div>                        
                    </div>                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
