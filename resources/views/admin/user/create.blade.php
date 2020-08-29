@extends('layouts.admin')
@section('title','User|Create')

@section('content')
      <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Create User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
               <li class="breadcrumb-item active"><a href="{{ route('user.index') }}"> User List</a></li>
              <li class="breadcrumb-item active"> Create User</li>
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
                  <h3 class="card-title"> Create User</h3>
                  <a href=" {{ route('user.index') }}" class="btn btn-primary">User List</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-12 col-lg-8 offset-lg-3 col-md-8 offset-md-2">

                    <!-- form start -->
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">

                            @include('admin.includes.errors')

                            <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control"name="name" placeholder="Enter User Name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                              <label for="name">Email</label>
                              <input type="email" class="form-control"name="email" placeholder="Enter User Email" value="{{old('email')}}">
                            </div>

                            <div class="form-group">
                              <label for="name">Password</label>
                              <input type="password" class="form-control"name="password" placeholder="">
                            </div>

                      


                             <div class="form-group">
                              <div class="row">
                                <div class="col-8">
                                  <label for="exampleInputFile">Image</label>
                                    <input type="file"  name="image"id="exampleInputFile">
                                </div>
                                
                              </div>
                                
                             </div>
                        

                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" class="form-control" placeholder="Enter Description">{{old('description')}}</textarea>
                            </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                  </div>
                </div>
              
            
              </div>
              <!-- /.card-body -->
            
          </div>
        </div>
      </div>
    </div>

     <!--End Main content -->

@endsection

{{-- @section('css')

<link rel="stylesheet" href="{{ asset('admin/css/summernote-bs4.css') }}">

@endsection

@section('script')
<script src="{{ asset('admin/js/summernote-bs4.js') }}"></script>

<script>
      $('#editor').summernote({
        placeholder: 'Enter Description',
        tabsize: 2,
        height: 200
      });
    </script>

@endsection --}}