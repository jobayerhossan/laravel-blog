@extends('layouts.admin')

@section('content')  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
              <li class="breadcrumb-item active">Create Post</li>
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

            @include('includes.errors')

            @if(Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
            @endif

          	 <form action="{{ route('post.store') }}" method="POST"  enctype="multipart/form-data">
              @csrf
              
              <div class="form-group">
                <label>
                  Post Title </label>
                  <input type="text" class="form-control" name="title" value="{{ old('title') }}">
              </div>
              <div class="form-group">
                <label>
                  Description </label>
                 <textarea name="description" id="description" cols="30" rows="10" class="form-control" value="{{ old('description') }}"></textarea>
              </div>

              <div class="form-group">
                <select name="category" id="category" class="form-control" value="{{ old('category') }}">
                  <option value="">Select Category</option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>

               <div class="form-group">
                  @foreach($tags as $tag)
                    <label>
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"> 
                        <span>{{ $tag->name }}</span>
                    </label>
                  @endforeach
              </div>



              <div class="form-group">
                <label for="">Images</label>
                <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
              </div>

              <button type="submit" class="btn btn-primary">Create Post</button>
            </form> 
       	
          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 


  @endsection