@extends('layouts.admin')
@section('title','Post')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}" target="_blank">Home</a></li>
              <li class="breadcrumb-item active">Post</li>
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
                  <h3 class="card-title">Post List</h3>
                  <a href=" {{route('post.create')}}" class="btn btn-primary">Create Post</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">SL</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Tags</th>
                      <th>Author</th>
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

                      <td class="d-flex">

                        <a href="{{ route('website.post',$post->slug) }}" class="btn btn-sm btn-primary mr-1" target="_blank"><i class="fas fa-telegram" aria-hidden=""></i></a>

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
                {{ $posts->links()}}
              </div>
              <!-- /.card-body -->
            
          </div>
        </div>
      </div>
    </div>

     <!--End Main content -->

@endsection