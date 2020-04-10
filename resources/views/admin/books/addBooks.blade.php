@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Books</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col col-md-5">
                                <label>ISBN</label>
                              <input type="number" class="form-control" placeholder="ISBN" name="isbn" required>
                            </div>
                            <div class="col col-md-6">
                                <label>Name</label>
                              <input type="text" class="form-control" placeholder="Name" name="name" required>
                            </div>
                          </div><br/>
                          <div class="row">
                            <div class="col col-md-5">
                                <label>Edition</label>
                              <input type="text" class="form-control" placeholder="Edition" name="edition" required>
                            </div>
                            <div class="col col-md-6">
                                <label>Author</label>
                              <input type="text" class="form-control" placeholder="Author" name="author" required>
                            </div>
                          </div><br/>
                          <div class="row">                          
                            <div class="col-md-6">
                                <label>Length</label>
                                <input type="number" class="form-control" placeholder="Length" name='length' required>
                            </div>
                          </div><br/>
                          <div class="row">
                            <div class="form-group col-md-6">
                                    <label for="exampleFormControlFile1">Thumbnail</label>
                                    <input type="file" class="form-control-file" name="thumbnail">
                                </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-12">
                              <label>Genre</label><br/>
                            @foreach($genres as $genre)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="genre[]" value="{{$genre->id}}">
                                    <label class="form-check-label" for="inlineCheckbox1">{{$genre->name}}</label>
                                </div> 
                            @endforeach                           
                          </div>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection