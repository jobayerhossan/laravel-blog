@extends('layouts.admin')

@section('content')  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Tag | {{ $tag->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tag</a></li>
              <li class="breadcrumb-item active">Edit Tag</li>
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

          	 <form action="{{ route('tag.update', array($tag->id)) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label>
                  Category name </label>
                  <input type="text" class="form-control" name="name" value="{{ $tag->name }}">
              </div>
              <div class="form-group">
                <label>
                  Description </label>
                 <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $tag->description }}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Update Tag</button>
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