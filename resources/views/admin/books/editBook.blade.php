@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Books:{{$book->name}}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('books.update',$book)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col col-md-5">
                                <label>ISBN</label>
                              <input type="number" class="form-control" placeholder="ISBN" name="isbn" value="{{$book->isbn}}">
                            </div>
                            <div class="col col-md-6">
                                <label>Name</label>
                              <input type="text" class="form-control" placeholder="Name" name="name" value="{{$book->name}}">
                            </div>
                          </div><br/>
                          <div class="row">
                            <div class="col col-md-5">
                                <label>Edition</label>
                                <input type="text" class="form-control" placeholder="Edition" name="edition" value="{{$book->edition}}">
                            </div>
                            <div class="col col-md-6">
                                <label>Author</label>
                                <input type="text" class="form-control" placeholder="Author" name="author" value="{{$book->author}}">
                            </div>
                          </div><br/>                          
                            <div class="form-group col-md-4">
                                <label>Length</label>
                                <input type="number" class="form-control" placeholder="Length" name='length' value="{{$book->length}}">
                            </div>
                            <div class="form-group col-md-6">
                                    <div class="col-md-6"><img src="{{asset('storage/thumbnails/'.$book->thumbnail)}}" height="150rem" class="card-img-top" alt="..."></div>
                                    <label for="exampleFormControlFile1">Update Thumbnail</label>
                                    <input type="file" class="form-control-file" name="thumbnail">
                                </div>
                            <div class="form-group col-md-12">
                              <label>Genre</label><br/>
                            @foreach($genres as $genre)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="genre[]" value="{{$genre->id}}">
                                    <label class="form-check-label" for="inlineCheckbox1">{{$genre->name}}</label>
                                </div> 
                            @endforeach                           
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection