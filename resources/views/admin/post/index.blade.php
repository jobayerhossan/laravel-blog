@extends('layouts.admin')

@section('content')  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Posts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Posts</li>
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

          	<div class="create_cat" style="margin-bottom: 20px">
          		<a href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
          	</div>

            @if(Session::has('success'))
              <div class="alert alert-success">
                {{ Session::get('success') }}
              </div>
            @endif

       		<table class="table table-striped">
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Image</th>
              <th>Name</th>
			        <th>Slug</th>
			        <th>Description</th>
              <th>Category</th>
              <th>Tags</th>
              <th>Author</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
            @if($posts->count(0) > 0) : 
            @foreach($posts as $post)
			      <tr>
			        <td>{{ $post->id }}</td>
			        <td>
                <div style="max-width: 70px; max-height:70px;overflow:hidden">
                    <img src="{{ asset($post->image) }}" class="img-fluid img-rounded" alt="">
                </div>   
              </td>
              <td>{{ $post->title }}</td>
			        <td>{{ $post->slug }}</td>
			        <td>{{ $post->description }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                @foreach($post->tags as $tag)
                  <span class="badge badge-primary">{{ $tag->name }}</span>
                @endforeach
              </td>
              <td>{{ $post->user->name }}</td>
              <td>
                <div class="d-flex">
                  <a href="{{ route('post.edit', array($post->id)) }}" class="mr-1 btn btn-primary"> <i class="fas fa-edit "></i> </a>
                  <form action="{{ route('post.destroy', array($post->id)) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="mr-1 btn btn-danger" > <i class="fas fa-trash"></i></button>
                  </form>
                  
                  <a href="{{ route('post.show', array($post->id)) }}" class="mr-1 btn btn-primary"> <i class="fas fa-eye"></i> </a>
                </div>
              </td>
			      </tr>
            @endforeach
            @else 
            <h2>No Post found!</h2>
            @endif
			    </tbody>
			  </table>
          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  @endsection