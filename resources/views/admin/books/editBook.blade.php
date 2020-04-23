@extends('layouts.admin')

@section('content')
<style>
    input{
        border:none;
    }
</style>

<div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" method="POST" action="{{route('books.update',$book->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <span class="contact100-form-title">
          Edit: <span class="text-primary font-weight-bolder">{{$book->name}}</span>
        </span>
        
        <label class="text-primary h6 font-weight-bolder">ISBN:</label>
        <div class="wrap-input100 validate-input" data-validate="ISBN is required">
          <input class="input100" id="isbn" type="text" name="isbn" placeholder="ISBN" value="{{$book->isbn}}">
          <label class="label-input100" for="name">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        @error('isbn')
            <span class="text text-danger">{{$errors->first('isbn')}}</span><br/>
        @enderror
        <label class="text-primary h6 font-weight-bolder">Name:</label>
        <div class="wrap-input100 validate-input" data-validate="Name is required">
          <input class="input100" id="name" type="text" name="name" placeholder="Name" value="{{$book->name}}">
          <label class="label-input100" for="name">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        @error('name')
            <span class="text text-danger">{{$errors->first('name')}}</span><br/>
        @enderror

        <label class="text-primary h6 font-weight-bolder">Edition:</label>
        <div class="wrap-input100 validate-input" data-validate="Edition is required">
          <input class="input100" id="edition" type="text" name="edition" placeholder="Edition" value="{{$book->edition}}">
          <label class="label-input100" for="name">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        @error('edition')
            <span class="text text-danger">{{$errors->first('edition')}}</span><br/>
        @enderror
        
        <label class="text-primary h6 font-weight-bolder">Author:</label>
        <div class="wrap-input100 validate-input" data-validate = "Author is required">
          <input class="input100" id="author" type="text" name="author" placeholder="Author" value="{{$book->author}}">
          <label class="label-input100" for="email">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        @error('author')
            <span class="text text-danger">{{$errors->first('author')}}</span><br/>
        @enderror
  
        <label class="text-primary h6 font-weight-bolder">Length:</label>
        <div class="wrap-input100 validate-input" data-validate = "Length is required">            
          <input class="input100" id="length" type="text" name="length" placeholder="Length" value="{{$book->length}}">
          <label class="label-input100" for="phone">
            <span class="text-danger font-weight-bolder">*</span>
          </label>
        </div>
        @error('length')
            <span class="text text-danger">{{$errors->first('length')}}</span><br/>
        @enderror

        <label class="h6 font-weight-bolder">Thumbnail</label>
        <div class="col-md-6 pb-4"><img src="{{asset('images/thumbnails/'.$book->thumbnail)}}" height="100rem" class="card-img-top" alt="..."></div>                              
        <input type="file" name="thumbnail">     
        <div>
          <label class="h6 font-weight-bolder">Genre</label><br/>
            @foreach($genres as $genre)
                @php
                    $flag=0;    
                @endphp
                @foreach ($checkedGenres as $checkedGenre)
                    @if($genre->name == $checkedGenre)
                        @php
                            $flag=1;   
                        @endphp
                        @break
                    @endif
                @endforeach
                @if($flag == 1)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="{{$genre->id}}" checked>
                        <label class="form-check-label" for="inlineCheckbox1">{{$genre->name}}</label>
                    </div>
                @else
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="{{$genre->id}}" >
                        <label class="form-check-label" for="inlineCheckbox1">{{$genre->name}}</label>
                    </div>
                @endif
            @endforeach  
        </div>
  
        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button type="submit" class="contact100-form-btn btn-primary">
              Update
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
  
@endsection