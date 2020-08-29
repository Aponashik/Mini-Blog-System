@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$postscount->count()}}</h3>

                <p>Post</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard nav-icon" style="color: white"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$categories->count()}}</h3>

                <p>Category</p>
              </div>
              <div class="icon">
                <i class="fas fa-tags nav-icon" style="color: white"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$userscount->count()}}</h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="fa fa-user nav-icon" style="color: white"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$messagescount->count()}}</h3>

                <p>Message</p>
              </div>
              <div class="icon">
                <i class="fa fa-envelope nav-icon" style="color: white"></i>
              </div>
              
            </div>
          </div>

          </div>
        <!-- /.row -->
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title">Post List</h3>
                  <a href=" {{route('post.index')}}" class="btn btn-primary">Post List</a>
                </div>
              </div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">SL</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Tags</th>
                      <th>Author</th>
                      <th>Published Date</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($posts->count())
                     
                    
                    @foreach ($posts as $key=>$post)
                     <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$post->title}}</td>

                      <td>
                        <div style="max-width: 100px;max-height: 70px; overflow: hidden;">
                            <img src="{{url('Post_Image/',$post->image)}}" class="img-fluid" alt="Post Image ">
                        </div>
                      </td>

                      <td>{{$post->category->name}}</td>

                      <td>
                        @foreach ($post->tags as $tag)
                          <span class="badge badge-primary">{{$tag->name}}</span>
                        @endforeach
                      </td>

                      <td>{{$post->user->name}}</td>
                      <td>{{$post->created_at->format('D m,y')}}</td>

                      <td class="d-flex">

                        <a href="{{ route('post.show',$post->id) }}" class="btn btn-sm btn-info mr-1"><i class="fas fa-eye"></i></a>
                        
                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-warning mr-1"><i class="fas fa-edit" ></i></a>

                        <form id="delete_form-{{ $post->id }}" action="{{ route('post.destroy',$post->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          
                        </form>
                        <button type="button" class="btn btn-sm btn-danger mr-1" 

                          onclick="if(confirm('Are You Sure Want to Delete This?'))
                                {
                                  event.preventDefault();
                                        document.getElementById('delete_form-{{ $post->id }}').submit();

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
                        <td colspan="7"><h5 class="text-center">No Post Found..</h5></td>
                      </tr>
                    @endif

                  </tbody>
                </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection