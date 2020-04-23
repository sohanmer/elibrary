@extends('layouts.admin')

@section('content')
{{-- <div class="py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header row">
                    <div class="col col-md-8">
                        <h3 class="font-weight-bolder">Available Books</h3>
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
                            <div class="col-sm-1 col-md-2 book pb-3">
                                <div class="card h-100 border border-success">
                                <img src="{{asset('storage/thumbnails/'.$book->thumbnail)}}" class="img-fluid img-thumbnail" alt="{{$book->name}}" style="height:10rem">
                                    <div class="card-body" >
                                        <h5 class="card-title"><b>{{ \Illuminate\Support\Str::limit($book->name, 15, $end='...') }}</b></h5>
                                        <p class="card-text"><b>{{ \Illuminate\Support\Str::limit($book->author, 20, $end='...') }}</b></p>
                                        @can('manage-books')
                                        <div class="row">                                                                                                  
                                            <div class="col text-center">
                                                <a href="{{route('books.edit',$book->id)}}">
                                                    <span class="h5 font-weight-bolder">Edit</span>
                                                </a>
                                            </div>
                                            <div class="col text-center">
                                                <a href="#deleteConfirm">
                                                    <span class="h5 font-weight-bolder text-danger"
                                                     data-toggle="modal"
                                                     data-bookid={{$book->id}}
                                                     data-target="#delete-modal">Delete</span>
                                                </a>
                                            </div>
                                            {{-- <div class="col text-center">
                                                <form action="{{route('books.destroy',$book->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="submit" style="background: white;
                                                    box-shadow: 0px 0px 0px transparent;                                                
                                                    border: 0px solid transparent;                                                
                                                    text-shadow: 0px 0px 0px transparent;
                                                    color:red;"
                                                    class="font-weight-bolder h5" value="Delete">
                                                </form>
                                            </div>  --}}
                                    {{-- </div>
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
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title  h4" id="exampleModalLabel">Delete:<span class="font-weight-bolder text-danger"> {{$book->name}}</span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('books.destroy',$book->id)}}" method="POST">
            @csrf
            @method('delete')
            <div class="modal-body font-weight-bolder h6">
                Are you sure?<br/>
            <input type="hidden" name="books_id" id="book_id" value="">                                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
            </form>
        </div>
        </div>
      </div>
    </div>
</div>  --}}
<div class="app-main__outer container-fluid">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>Admin Dashboard</div>
                </div>                
            </div>
        </div>            
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Books</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$books->count()}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Users</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$users->count()-1}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Genres</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{$genres->count()}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header-tab-animation card-header">
                            <div class="card-header-title">
                                Genres
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tabs-eg-77">                                    
                                    <div class="scroll-area-sm">
                                        <div class="scrollbar-container">
                                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                @foreach($genres as $genre)
                                                                    <div class="widget-heading h5">{{$genre->name}}</div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title">
                                Past seven days activities
                            </div>                            
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="tab-eg-55">
                                <div class="widget-chart p-3">
                                    
                                    
                                </div>
                                <div class="pt-2 card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers fsize-3 text-muted">{{$booksThisWeek}}</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="text-muted opacity-6 pl-4">Books Added in last 7 days</div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-progress-wrapper mt-1">
                                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-success" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: {{$booksThisWeek}}%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers fsize-3 text-muted">{{$usersThisWeek}}</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="text-muted opacity-6 pl-4">User Registered in last 7 days</div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-progress-wrapper mt-1">
                                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="{{$usersThisWeek}}%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-numbers fsize-3 text-muted">{{$booksReadThisWeek}}</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="text-muted opacity-6">Books read in last 7 days</div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-progress-wrapper mt-1">
                                                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width: {{$booksReadThisWeek}}%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>        
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
</div>
</div>
<script type="text/javascript" src="{{asset('admin/assets/scripts/main.js')}}"></script>
@endsection
