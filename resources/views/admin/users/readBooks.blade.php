@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Books You Already Read</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">                        
                        @foreach($books as $book)
                            @php
                              $flag=1;   
                            @endphp
                            @foreach ($readBooks as $readBook)
                                @if($book->id == $readBook)
                                    @php
                                        $flag=0;
                                    @endphp
                                    @break
                                @else
                                    @php
                                        $flag=1;
                                    @endphp
                                @endif
                            @endforeach
                            @if($flag==0)
                                <div class="col-sm-3 book">
                                    <div class="card" style="width: 14rem;" data-toggle="tooltip" data-placement="bottom" title="Edition:{{$book->edition}}  Length:{{$book->length}}">
                                        <img src="{{asset('storage/thumbnails/'.$book->thumbnail)}}" height="150rem" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$book->name}}</h5>
                                            <p class="card-text">Author(s):{{$book->author}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach   
                    </div>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
