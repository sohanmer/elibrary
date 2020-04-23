@extends('layouts.admin')

@section('content')
{{-- <div class="py-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
              <div class="card">
                <div class="card-header">
                  <h3 class="font-weight-bolder">ManageUsers </h3>
                </div>

                <div class="card-body row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class = "col">
                      <div class="row justify-content-around">
                        <div class="col col-md-4 col-xs-4 bg-primary tile square">Total books</div>
                        <div class="col col-md-4 bg-primary">Total books</div>
                      </div>
                    </div>
                  <div class="col-md-6">
                    <table class="table">
                      <thead class="bg-info">
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      @foreach($users as $user)
                        <tbody>
                          @if($user->name != 'admin' )
                            <tr>
                              <th scope="row">{{$user->id}}</th>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>
                                <form  action="{{route('users.destroy',$user->id)}}" method="POST">
                                  @csrf
                                  @method('delete')
                                  <input type="submit" class="btn btn-danger" value="Delete"/>
                                </form>
                              </td>
                            </tr>
                          @endif
                        </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div> --}}
<div class="app-main__outer">
  <div class="app-main__inner">
      <div class="app-page-title">
          <div class="page-title-wrapper">
              <div class="page-title-heading">
                  <div class="page-title-icon">
                      <i class="fas fa-users icon-gradient bg-primary">
                      </i>
                  </div>
                  <div>Manage Users</div>
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
              <div class="main-card mb-3 card">
                  <div class="table-responsive" style="max-height:470px">
                      <table id="user-table" class="align-middle mb-0 table table-borderless table-striped table-hover" style="width:100%">
                          <thead>
                          <tr>
                              <th class="text-center">ID</th>
                              <th>Name</th>
                              <th class="text-center">Email</th>
                              <th class="text-center">Actions</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($users as $user)
                            @if($user->name != 'admin')
                              <tr>
                                  <td class="text-center text-muted">{{$user->id}}</td>
                                  <td>
                                      <div class="widget-content p-0">
                                          <div class="widget-content-wrapper">
                                              <div class="widget-content-left mr-3">
                                                  <div class="widget-content-left">
                                                      <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                  </div>
                                              </div>
                                              <div class="widget-content-left flex2">
                                                  <div class="widget-heading">{{$user->name}}</div>
                                              </div>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="text-center">
                                  <div>{{$user->email}}</div>
                                  </td>
                                  <td class="text-center">
                                    <div class="col">                                            
                                      <button class="btn btn-danger delete-user" data-toggle="modal" 
                                              data-item="{{route('users.destroy',$user->id)}}" 
                                              data-target="#delete-user">Delete
                                      </button>
                                  </div>
                                  </td>
                              </tr>
                            @endif
                          @endforeach                          
                          </tbody>
                      </table>
                  </div>                  
              </div>
          </div>
      </div>
    </div>

</div>
</div>
<script>
  $(document).ready( function () {
      $('#user-table').DataTable();
  } );
  $('.delete-user').click( function () {
        var id = $(this).attr('data-item');
        $('#user-delete').attr('action',id);
    } );
</script>

@endsection