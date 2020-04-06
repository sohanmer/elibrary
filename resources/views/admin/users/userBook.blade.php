@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Available Books</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">                        
                        @foreach($books as $book)
                            <div class="col-sm-3 book">
                            <div class="card" style="width: 14rem;" data-toggle="tooltip" data-placement="bottom" title="Edition:{{$book->edition}}  Length:{{$book->length}}">
                                <img src="{{asset('storage/thumbnails/'.$book->thumbnail)}}" height="150rem" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <h5 class="card-title">{{$book->name}}</h5>
                                    <p class="card-text">Author(s):{{$book->author}}</p>
                                    @can('read-books')
                                    <div class="container-fluid">                                                                                                  
                                       <div class="row"> 
                                           {{-- <div class="col col-md-10">
                                               <a href="{{route('userBooks.update',$book)}}" class="btn btn-primary">Mark as read</a>
                                           </div> --}}
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
                                                <div class="col col-md-12">
                                                    <form action="{{route('userBooks.update',$book)}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="submit" class= "btn btn-primary"value="Mark as read"></form>
                                                </div>
                                            @else
                                                <div class="col col-md-12">
                                                    <form action="{{route('userBooks.destroy',$book)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="submit" class= "btn btn-danger"value="Mark as Unread"></form>
                                                </div>
                                            @endif                                           
                                       </div>
                                    </div>
                                    @endcan
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
@endsection
