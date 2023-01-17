@extends('backend.layouts')
@section('title')
Brand
@endsection

@section('breadcrumb')
<div class="app-title">
    <div>
      <h1><i class="fa fa-bell-o"></i> Brand Modification</h1>
      <p>Application Brand Parameter Setup</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Parameter Setup</a></li>
      <li class="breadcrumb-item"><a href="#">Brand Modification</a></li>
    </ul>
  </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-2">
        <form action="{{ route('admin.brand.update', [$id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="tile">
            <h3 class="tile-title">Brand Modification</h3>
            <div class="tile-body">
            
                <div class="form-group">
                    <label class="control-label">Title <span style="color:red;">**</span></label>
                    <input class="form-control" type="text" placeholder="Title" value="{{ $title }}" name="title" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea name="description" class="form-control" placeholder="description" cols="3" rows="3">{{ $description }}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
            
            </div>
            <div class="tile-footer">            
                <button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>
            </div>
        </form>
      </div>
</div>
@endsection