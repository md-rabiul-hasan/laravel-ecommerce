@extends('backend.layouts')
@section('title')
Brand
@endsection

@section('breadcrumb')
<div class="app-title">
    <div>
      <h1><i class="fa fa-bell-o"></i> Brand Show</h1>
      <p>Application Brand Parameter Setup</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Brand  Show</a></li>
    </ul>
  </div>
@endsection

@section('content')

<a href="{{ route('admin.brand.index')}}" class="btn btn-primary mb-3"> <i class="fa fa-long-arrow-left"></i> Back</a>

<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              
              <tbody>
                  <tr>
                    <th>Title</th>
                    <td>{{ $title }}</td>
                  </tr>
                  <tr>
                    <th>Slug</th>
                    <td>{{ $slug }}</td>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td>{{ $description }}</td>
                  </tr>

                  @if(isset($image)) 
                    <th>Image</th>
                    <td><img class="img-thumbnail" style="cursor: pointer" onclick="imagePreviewModal('{{ asset($image) }}')"  alt="200x200" width="200" src="{{ asset($image) }}" data-holder-rendered="true"></td>
                        
                    @endif
                  <tr>
                   
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')

@endpush