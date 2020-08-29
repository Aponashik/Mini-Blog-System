@extends('layouts.admin')
@section('title','Post|View')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> View Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
               <li class="breadcrumb-item active"><a href="{{ route('post.index') }}"> Post List</a></li>
               <li class="breadcrumb-item active"><a href="{{ route('post.create') }}"> Create Post </a></li>
              <li class="breadcrumb-item active"> View Post</li>
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
                  <h3 class="card-title"> View Post</h3>
                  <a href=" {{ route('post.index') }}" class="btn btn-primary">Post List</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <th style="width: 200px">Title</th>
                          <td>{{$post->title}}</td>
                        </tr>

                        <tr>
                          <th style="width: 200px">Image</th>
                          <td>
                            <div style="max-width: 300px;max-height:300px; overflow: hidden;">
                            <img src="{{url('Post_Image/',$post->image)}}" class="img-fluid" alt="Post Image ">
                        </div>
                          </td>
                        </tr>
                        <tr>
                          <th style="width: 200px">Category</th>
                          <td>{{$post->category->name}}</td>
                        </tr>

                        

                        <tr>
                          <th style="width: 200px">Slug</th>
                          <td>
                            @foreach ($post->tags as $tag)
                              <span class="badge badge-primary">{{$tag->name}}</span>
                            @endforeach
                          </td>
                        </tr>

                        <tr>
                          <th style="width: 200px">Author</th>
                          <td>{{$post->user->name}}</td>
                        </tr>

                        <tr>
                          <th style="width: 200px">Description</th>
                          <td>{!! $post->description !!}</td>
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