@extends('layouts.admin')
@section('title','Message')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Messages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}" target="_blank">Home</a></li>
               <li class="breadcrumb-item active"><a href="{{ route('contact.index') }}"> Message List</a></li>
               
              <li class="breadcrumb-item active"> View Messages</li>
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
                  <h5> Message from {{$messages->email}}</h5>
                  <a href=" {{ route('contact.index') }}" class="btn btn-primary">Message List</a>

                  <form id="delete_form-{{ $messages->id }}" action="{{ route('contact.destroy',$messages->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          
                        </form>
                        <button type="button" class="btn btn-sm btn-danger mr-1" 

                          onclick="if(confirm('Are You Sure Want to Delete This?'))
                                {
                                  event.preventDefault();
                                        document.getElementById('delete_form-{{ $messages->id }}').submit();

                                }
                                  else{
                                    event.preventDefault();
                                  }">Delete Message</i>

                        </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th style="width: 200px">Name</th>
                          <td>{{$messages->name}}</td>
                        </tr>
                        <tr>
                          <th style="width: 200px">Email</th>
                          <td>{{$messages->email}}</td>
                        </tr>

                        <tr>
                          <th style="width: 200px">Subject</th>
                          <td>{{$messages->subject}}</td>
                        </tr>

                        <tr>
                          <th style="width: 200px">Message</th>
                          <td>{!! $messages->message !!}</td>
                        </tr>

                         
                     
                      </tbody>
                    </table>
              
            
              </div>
              <!-- /.card-body -->
            
          </div>
        </div>
      </div>
    </div>

     <!--End Main content -->

@endsection