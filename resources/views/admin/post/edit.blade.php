@extends('layouts.admin')
@section('title','Post|Edit')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('post.index') }}"> Post List</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('post.create') }}"> Create Post</a></li>
              <li class="breadcrumb-item active">Edit Post</li>
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
                  <h3 class="card-title">Edit Post :: <span>{{$post->name}}</span></h3>
                  <a href=" {{ route('post.index') }}" class="btn btn-primary">Post List</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-12 col-lg-8 offset-lg-3 col-md-8 offset-md-2">

                    <!-- form start -->
                         <form action="{{ route('post.update',$post->id) }}" method="post" 
                          enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="card-body">

                            @include('admin.includes.errors')

                            <div class="form-group">
                              <label for="name">Post Title</label>
                              <input type="text" class="form-control"name="title"placeholder="Enter Post Title"value="{{$post->title}}">
                            </div>

                            <div class="form-group" style="width: 50%">
                              <label for="name">Post Category</label>
                              <select name="category" id="category" class="form-control">
                                <option selected style="display: none;">Select Category</option>
                                @foreach ($categories as $category)
                                  <option value="{{$category->id}}" @if($post->category_id==$category->id) selected @endif>
                                    {{$category->name}}
                                  </option>
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
                                  <input class="custom-control-input" name="tags[]" type="checkbox" id="{{$tag->id}}" value="{{$tag->id}}"

                                    @foreach ($post->tags as $checked_tag)
                                      @if ($tag->id==$checked_tag->id) checked @endif                                   
                                    @endforeach
                                  >
                                  <label for="{{$tag->id}}" class="custom-control-label">{{$tag->name}}</label>
                                </div>
                              @endforeach
                              </div>
                              
                              </div>

                            <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" id="editor" class="form-control" placeholder="Enter Description">{{$post->description}}</textarea>
                            </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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