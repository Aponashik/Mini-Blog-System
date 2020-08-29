@extends('layouts.admin')
@section('title','Tag')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tag List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
              <li class="breadcrumb-item active">Tags</li>
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
                  <h3 class="card-title">Tag List</h3>
                  <a href="{{ route('tag.create') }}" class="btn btn-primary">Create Tag</a>
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
                      <th>Description</th>
                      <th>Slug</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if ($tags->count())
                    
                        @foreach ($tags as $key=>$tag)
                         <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$tag->name}}</td>
                          <td>{{$tag->description}}</td>
                          <td>{{$tag->slug}}</td>
                          <td class="d-flex">
                            <a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-sm btn-warning mr-1"><i class="fas fa-edit" ></i></a>

                            <form id="delete_form-{{ $tag->id }}" action="{{ route('tag.destroy',$tag->id) }}" method="POST" >            
                              @method('DELETE')
                              @csrf
                              
                            </form>
                            <button type="button" class="btn btn-sm btn-danger mr-1" 

                              onclick="if(confirm('Are You Sure Want to Delete This?'))
                                    {
                                      event.preventDefault();
                                            document.getElementById('delete_form-{{ $tag->id }}').submit();

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
                        <td colspan="5"><h5 class="text-center">No Records Found..</h5></td>
                      </tr>

                    @endif

                  </tbody>
                </table>
                {{ $tags->links()}}
              </div>
              <!-- /.card-body -->
            
          </div>
        </div>
      </div>
    </div>

     <!--End Main content -->

@endsection