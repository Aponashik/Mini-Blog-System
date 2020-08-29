@extends('layouts.admin')
@section('title','Post|Create')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Create Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
               <li class="breadcrumb-item active"><a href="{{ route('post.index') }}"> Post List</a></li>
              <li class="breadcrumb-item active"> Create Post</li>
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
                  <h3 class="card-title"> Create Post</h3>
                  <a href=" {{ route('post.index') }}" class="btn btn-primary">Post List</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-12 col-lg-8 offset-lg-3 col-md-8 offset-md-2">

                    <!-- form start -->
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">

                            @include('admin.includes.errors')

                            <div class="form-group">
                              <label for="name">Post Title</label>
                              <input type="text" class="form-control"name="title" placeholder="Enter Post Title" value="{{old('title')}}">
                            </div>

                            <div class="form-group" style="width: 50%">
                              <label for="name">Post Category</label>
                              <select name="category" id="category" class="form-control">
                                <option selected style="display: none;">Select Category</option>
                                @foreach ($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
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
                              <label for="name">Select Post Tags</label>
                              <div class="row">                          
                                  @foreach ($tags as $tag)
                                    <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                      <input class="custom-control-input" name="tags[]" type="checkbox" id="{{$tag->id}}" value="{{$tag->id}}">
                                      <label for="{{$tag->id}}" class="custom-control-label">{{$tag->name}}</label>
                                    </div>
                                  @endforeach                            
                              </div>                            
                            </div>
                        

                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" class="form-control" id="editor" placeholder="Enter Description">{{old('description')}}</textarea>
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

@section('css')

<link rel="stylesheet" href="{{ asset('admin/css/summernote-bs4.css') }}">

@endsection

@section('script')
<script src="{{ asset('admin/js/summernote-bs4.js') }}"></script>

<script>
      $('#editor').summernote({
        placeholder: 'Enter Description',
        tabsize: 2,
        height: 300
      });
</script>

@endsection