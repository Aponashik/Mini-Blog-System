@extends('layouts.admin')
@section('title','Message')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Message List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}" target="_blank">Home</a></li>
              <li class="breadcrumb-item active"> Message</li>
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
                  <h3 class="card-title">Message List</h3>
                 
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
                      <th>Email</th>
                      <th>Subject</th>
                      
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($messages->count())
                     
                    
                    @foreach ($messages as $key=>$message)
                     <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$message->name}}</td>
                      <td>{{$message->email}}</td>
                      <td>{{$message->subject}}</td>
                      <td class="d-flex">

                        <a href="{{ route('contact.show',$message->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-eye"></i></a>

                        <form id="delete_form-{{ $message->id }}" action="{{ route('contact.destroy',$message->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          
                        </form>
                        <button type="button" class="btn btn-sm btn-danger mr-1" 

                          onclick="if(confirm('Are You Sure Want to Delete This?'))
                                {
                                  event.preventDefault();
                                        document.getElementById('delete_form-{{ $message->id }}').submit();

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
                        <td colspan="5"><h5 class="text-center">No Message Found..</h5></td>
                      </tr>
                    @endif

                  </tbody>
                </table>
                {{ $messages->links()}}
              </div>
              <!-- /.card-body -->
            
          </div>
        </div>
      </div>
    </div>

     <!--End Main content -->

@endsection