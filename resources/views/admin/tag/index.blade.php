@extends('layouts.admin')

@section('content')  
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tag</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Tag</li>
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
          		<a href="{{ route('tag.create') }}" class="btn btn-primary">Create Tag</a>
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
			        <th>Name</th>
			        <th>Slug</th>
			        <th>Description</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
            @if($tags->count() > 0)
              @foreach($tags as $tag)
  			      <tr>
  			        <td>{{ $tag->id }}</td>
  			        <td>{{ $tag->name }}</td>
  			        <td>{{ $tag->slug }}</td>
  			        <td>{{ $tag->description }}</td>
                <td>
                  <div class="d-flex">
                    <a href="{{ route('tag.edit', array($tag->id)) }}" class="mr-1 btn btn-primary"> <i class="fas fa-edit "></i> </a>
                    <form action="{{ route('tag.destroy', array($tag->id)) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="mr-1 btn btn-danger" > <i class="fas fa-trash"></i></button>
                    </form>
                    
                    <a href="{{ route('tag.show', array($tag->id)) }}" class="mr-1 btn btn-primary"> <i class="fas fa-eye"></i> </a>
                  </div>
                </td>
  			      </tr>
              @endforeach
              @else 

                <tr>
                  No Tag Found 
                </tr>

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