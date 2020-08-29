@extends('layouts.admin')
@section('title','Category')

@section('content')
	    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                  <h3 class="card-title">Category List</h3>
                  <a href=" {{route('category.create')}}" class="btn btn-primary">Create Category</a>
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
                      <th>Post Count</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($categories->count())
                     
                    
                    @foreach ($categories as $key=>$category)
                     <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$category->name}}</td>
                      <td>{{Illuminate\Support\Str::limit(strip_tags($category->description,50))}}</td>
                      <td>{{$category->slug}}</td>
                      <td>{{$category->posts->count()}}</td>
                      <td class="d-flex">
                        <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-warning mr-1"><i class="fas fa-edit" ></i></a>

                        <form id="delete_form-{{ $category->id }}" action="{{ route('category.destroy',$category->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          
                        </form>
                        <button type="button" class="btn btn-sm btn-danger mr-1" 

                          onclick="if(confirm('Are You Sure Want to Delete This?'))
                                {
                                  event.preventDefault();
                                        document.getElementById('delete_form-{{ $category->id }}').submit();

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
                        <td colspan="6"><h5 class="text-center">No Categories Found..</h5></td>
                      </tr>
                    @endif

                  </tbody>
                </table>
                {{ $categories->links()}}
              </div>
              <!-- /.card-body -->
            
          </div>
        </div>
      </div>
    </div>

     <!--End Main content -->

@endsection