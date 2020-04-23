@extends('layouts.admin')

@section('content')    
<div class="app-main__outer container-fluid">
    <div class="app-main__inner" style="top: 4.2em;">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-book icon-gradient bg-primary"></i>
                    </div>
                  <div>Book List</div>
                </div>
            </div>
        </div>
    </div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card widget-content">
                    <div class="table-responsive" style="max-height:470px">
                       <table class="align-middle widget-content-left mb-0 table table-borderless table-striped table-hover display" 
                              style="width:100%" id="book-table">
                            <thead>
                                <tr class="sticky-top">
                                    <th class="text-center">ISBN</th>
                                    <th>Cover</th>
                                    <th>Name</th>
                                    <th class="text-center">Author</th>
                                    <th class="text-center">Edition</th>
                                    <th class="text-center">Length</th>
                                    <th class="text-center">Genres</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <td class="text-center text-muted">{{$book->isbn}}</td>
                                        <td>
                                            <img src="{{asset('images/thumbnails/'.$book->thumbnail)}}" height="70px" width="70px">
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{$book->name}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div>{{$book->author}}</div>
                                        </td>
                                        <td class="text-center">
                                            <div>{{$book->edition}}</div>
                                        </td>
                                        <td class="text-center">
                                            <div>{{$book->length}}</div>
                                        </td>
                                        <td>
                                            @foreach ($bookGenres as $bookGenre)
                                                @if ($bookGenre->books_id == $book->id)
                                                    <span class="badge badge-warning">{{$bookGenre->name}}</span>
                                                @endif                                                
                                            @endforeach 
                                        </td>
                                        <td class="text-center">
                                            <div class="row" >
                                                <div class="col">
                                                    <a href="{{route('books.edit',$book->id)}}">
                                                        <button class="btn btn-primary">
                                                        Edit
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="col">                                            
                                                    <button class="btn btn-danger delete-modal" data-toggle="modal" 
                                                            data-item="{{route('books.destroy',$book->id)}}" 
                                                            data-target="#delete-modal">Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach                          
                          </tbody>
                      </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</div>
    


<script>
    $(document).ready( function () {
        $('#book-table').DataTable();
    } );
    $('.delete-modal').click( function () {
        var id = $(this).attr('data-item');
        $('#delete-form').attr('action',id);
    } );
</script>

@endsection