@extends('backend.layouts')
@section('title')
Category
@endsection

@section('breadcrumb')
<div class="app-title">
    <div>
      <h1><i class="fa fa-bell-o"></i> Category Create</h1>
      <p>Application Category Parameter Setup</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Parameter Setup</a></li>
      <li class="breadcrumb-item"><a href="#">Category Create</a></li>
    </ul>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-2">
        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tile">
            <h3 class="tile-title">Add New Category</h3>
            <div class="tile-body">
            
                <div class="form-group">
                    <label class="control-label">Title <span style="color:red;">**</span></label>
                    <input class="form-control" type="text" placeholder="Title" name="title" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
            
            </div>
            <div class="tile-footer">            
                <button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
            </div>
        </form>
      </div>
</div>
@endsection