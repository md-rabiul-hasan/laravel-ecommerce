@extends('backend.layouts')
@section('title')
Sub-Category
@endsection

@section('breadcrumb')
<div class="app-title">
    <div>
      <h1><i class="fa fa-bell-o"></i> Sub-Category</h1>
      <p>Application Sub-Category Parameter Setup</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Sub-Category Setup</a></li>
    </ul>
  </div>
@endsection

@section('content')

<a href="{{ route('admin.sub-category.create')}}" class="btn btn-primary mb-3"> <i class="fa fa-plus"></i> Add New</a>

<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sub_categories as $sub_category )
                  <tr>
                    <td>{{ $sl++ }}</td>
                    <td>
                        @if($sub_category->image)
                            <img class="img-thumbnail" style="cursor: pointer" onclick="imagePreviewModal('{{ asset($sub_category->image) }}')"  alt="200x200" width="100" src="{{ asset($sub_category->image) }}" data-holder-rendered="true">
                        @endif                       
                    </td>
                    <td>{{ $sub_category->category->title }}</td>
                    <td>{{ $sub_category->title }}</td>
                    <td>
                      <a href="{{ route('admin.sub-category.edit', [$sub_category->id]) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                      <button onclick="deleteSubCategory({{ $sub_category->id }})" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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
      function deleteSubCategory(id){
        cuteAlert({
            type: "question",
            title: "Are you sure? You want to delete this sub-category?",
            message: "",
            confirmText: "Yes",
            cancelText: "Cancel"
          }).then((e)=>{        
            if ( e == ("confirm")){
                let token = $('meta[name="csrf-token"]').attr('content');
                loaderStart();
                $.ajax({
                    url: '/admin/sub-category/' + id,
                    method: 'DELETE',
                    data:{
                        _token: token
                    },
                    success: function(result){
                        loaderEnd();
                        if(result.success === true){
                            cuteSuccess("Sub-Category delete successfully", "{{ route('admin.sub-category.index') }}" )
                        }
                    }
                });
            }
        })        
      }
    </script>
@endpush