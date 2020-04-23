@extends('layouts.admin')

@section('content')
<style>
  input{
    border:none;
  }
  </style>
{{-- <div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Add Books</b></div>

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
                            <div class="col-md-5">
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
                        <button type="submit" class="btn btn-primary">Add</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-contact100">
  <div class="wrap-contact100">
    <form class="contact100-form validate-form" method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
      @csrf
      <span class="contact100-form-title">
        Add a New Book
      </span>

      <div class="wrap-input100 ">
        <input class="input100" id="isbn" type="text" name="isbn" placeholder="ISBN">
        <label class="label-input100" for="name">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>
      @error('isbn')
        <span class="text-danger">{{$error->first('isbn')}}</span>
      @enderror

      <div class="wrap-input100 validate-input" data-validate="Name is required">
        <input class="input100" id="name" type="text" name="name" placeholder="Name">
        <label class="label-input100" for="name">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Edition is required">
        <input class="input100" id="edition" type="text" name="edition" placeholder="Edition">
        <label class="label-input100" for="name">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Author is required">
        <input class="input100" id="author" type="text" name="author" placeholder="Author">
        <label class="label-input100" for="email">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Length is required">
        <input class="input100" id="length" type="text" name="length" placeholder="Length">
        <label class="label-input100" for="phone">
          <span class="text-danger font-weight-bolder">*</span>
        </label>
      </div>
      {{-- <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile01"
            aria-describedby="inputGroupFileAddon01" name="thumbnail">
          <label class="custom-file-label" for="inputGroupFile01">Cover Photo</label>
        </div>
      </div> --}}
      <input type="file" name="thumbnail">

      <div>
        <label class="font-weight-bolder h6"><br/>Genre</label><br/>      
        @foreach($genres as $genre)
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="genre[]" style="padding-left:0px" value="{{$genre->id}}">
            <label class="form-check-label" for="inlineCheckbox1" style="padding-left:0px;padding-right:0px">{{$genre->name}}</label>
          </div> 
        @endforeach
      </div>

      <div class="container-contact100-form-btn">
        <div class="wrap-contact100-form-btn">
          <div class="contact100-form-bgbtn"></div>
          <button type="submit" class="contact100-form-btn btn-primary">
            Add
          </button>
        </div>
      </div>
    </form>
  </div>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('forms/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('forms/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('forms/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('forms/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('forms/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('forms/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('forms/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('forms/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('forms/js/main.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
@endsection