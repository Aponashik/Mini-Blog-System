@extends('layouts.admin')
@section('title','Category')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Create Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
               <li class="breadcrumb-item active"><a href="{{ route('category.index') }}"> Category List</a></li>
              <li class="breadcrumb-item active"> Create Category</li>
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
                  <h3 class="card-title"> Create Category</h3>
                  <a href=" {{ route('category.index') }}" class="btn btn-primary">Category List</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-6 col-lg-6 offset-lg-3 col-md-8 offset-md-2">

                    <!-- form start -->
                        <form action="{{ route('category.store') }}" method="POST">
                          @csrf
                          <div class="card-body">

                            @include('admin.includes.errors')
                            <div class="form-group">
                              <label for="name">Category Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" class="form-control" rows="4" placeholder="Enter Description"></textarea>
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