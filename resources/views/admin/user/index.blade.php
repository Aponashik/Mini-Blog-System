@extends('layouts.admin')
@section('title','User')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


        <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title">User List</h3>
                  <a href=" {{route('user.create')}}" class="btn btn-primary">Create User</a>
                </div>

               {{--  @include('admin.includes.success') --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">SL</th>
                      <th>Name</th>
                      <th>Image</th>
                      
                      <th>Email</th>
                      <th>Post Count</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($users->count())
                     
                    
                    @foreach ($users as $key=>$user)
                     <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$user->name}}</td>
                       <td> 
                          <div style="max-width: 70px; max-height:70px;overflow:hidden">
                              <img src="{{ asset($user->image) }}" class="img-fluid" alt="">
                          </div>
                        </td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->posts->count()}}</td>
                      <td class="d-flex">
                        <a href="{{ route('user.profile',$user->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-eye"></i></a>
                        

                        <form id="delete_form-{{ $user->id }}" action="{{ route('user.destroy',$user->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          
                        </form>
                        <button type="button" class="btn btn-sm btn-danger mr-1" 

                          onclick="if(confirm('Are You Sure Want to Delete This?'))
                                {
                                  event.preventDefault();
                                        document.getElementById('delete_form-{{ $user->id }}').submit();

                                }
                                  else{
                                    event.preventDefault();
                                  }"><i class="fas fa-trash"></i>

                        </button> 
                      </td>
                     </tr>
                    @endforeach
                    
                    @else
                      <tr>
                        <td colspan="6"><h5 class="text-center">No User Found..</h5></td>
                      </tr>
                    @endif

                  </tbody>
                </table>
                {{ $users->links()}}
              </div>
              <!-- /.card-body -->
            
          </div>
        </div>
      </div>
    </div>

     <!--End Main content -->

@endsection