@extends('backend.layouts')
@section('title')
Brand
@endsection

@section('breadcrumb')
<div class="app-title">
    <div>
      <h1><i class="fa fa-bell-o"></i> Brand</h1>
      <p>Application Brand Parameter Setup</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Brand Setup</a></li>
    </ul>
  </div>
@endsection

@section('content')

<a href="{{ route('admin.brand.create')}}" class="btn btn-primary mb-3"> <i class="fa fa-plus"></i> Add New</a>

<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($brands as $brand )
                  <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ $brand->title }}</td>
                    <td>{{ $brand->description }}</td>
                    <td>
                      <a href="{{ route('admin.brand.edit', [$brand->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="{{ route('admin.brand.show', [$brand->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                      <button onclick="deleteBrand({{ $brand->id }})" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
               
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('backend/assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('backend/assets/js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script>
      function deleteBrand(id){
        cuteAlert({
            type: "question",
            title: "Are you sure? You want to delete this brand?",
            message: "",
            confirmText: "Yes",
            cancelText: "Cancel"
          }).then((e)=>{        
            if ( e == ("confirm")){
                let token = $('meta[name="csrf-token"]').attr('content');
                loaderStart();
                $.ajax({
                    url: '/admin/brand/' + id,
                    method: 'DELETE',
                    data:{
                        _token: token
                    },
                    success: function(result){
                        loaderEnd();
                        if(result.success === true){
                            cuteSuccess("Brand delete successfully", "{{ route('admin.brand.index') }}" )
                        }
                    }
                });
            }
        })        
      }
    </script>
@endpush