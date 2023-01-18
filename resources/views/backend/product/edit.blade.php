@extends('backend.layouts')
@push('css')
<style>
   .select2 {
      width: 100%!important;
   }
</style>
@endpush
@section('title')
Product 
@endsection
@section('breadcrumb')
<div class="app-title">
   <div>
      <h1><i class="fa fa-bell-o"></i> Product Modification</h1>
      <p>Application Product Modification</p>
   </div>
   <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Product Modification</a></li>
   </ul>
</div>
@endsection
@section('content')
<form action="{{ route('admin.product.update', [$product->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
   <div class="row">
      @csrf
      <div class="col-md-6">
         <div class="tile">
            <h3 class="tile-title">Product Modification</h3>
            <div class="tile-body">
               <div class="form-group">
                  <label class="control-label">Title <span style="color:red;">**</span></label>
                  <input class="form-control" type="text" placeholder="Title" name="title" value="{{ $product->title }}" required>
               </div>
               <div class="form-group">
                  <label class="control-label">Select Brand <span style="color:red;">**</span></label>
                  <select class="form-control select2" name="brand_id" required>
                     <option value="">Select Brand</option>
                     @foreach($brands as $brand)
                     <option value="{{ $brand->id }}" @if($brand->id == $product->brand_id) {{ "selected" }} @endif >{{ $brand->title }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label class="control-label">Select Category <span style="color:red;">**</span></label>
                  <select class="form-control select2" name="category_id" id="category_id" required onchange="findSubCategory()">
                     <option value="">Select Category</option>
                     @foreach($categories as $category)
                     <option value="{{ $category->id }}" @if($category->id == $product->category_id) {{ "selected" }} @endif>{{ $category->title }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                <label class="control-label">Select Sub-Category <span style="color:red;">**</span></label>
                <select class="form-control select2" name="sub_category_id" id="sub_category_id" required>
                    <option value="">select sub-category</option>
                    @foreach($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}" @if($sub_category->id == $product->sub_category_id) {{ "selected" }} @endif>{{ $sub_category->title }}</option>
                    @endforeach
                </select>
             </div>
               <div class="form-group">
                  <label class="control-label">Quantity <span style="color:red;">**</span></label>
                  <input class="form-control" type="number" placeholder="1" name="quantity" value="{{ $product->quantity }}" required>
               </div>
               <div class="form-group">
                  <label class="control-label">Price <span style="color:red;">**</span></label>
                  <input class="form-control" type="number" placeholder="100.00" step="0.01" min="1" value="{{ $product->price }}" name="price" required>
               </div>
               <div class="form-group">
                  <label class="control-label">Discount Percentage <span style="color:red;">**</span></label>
                  <input class="form-control" type="number" placeholder="5%" step="0.01" min="0" max="100" value="{{ $product->discount_percentage }}" name="discount_percentage" required>
               </div>
               <div class="form-group">
                  <label class="control-label">Current Price <span style="color:red;">**</span></label>
                  <input class="form-control" type="number" readonly value="{{ $product->current_price }}" name="current_price" required>
               </div>
               <div class="form-group">
                <label class="control-label">Image</label>
                <input class="form-control" type="file" name="image">
             </div>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="tile">
            <h3 class="tile-title">Product Description</h3>
            <div class="tile-body">
               <div class="form-group">
                  <label class="control-label">Key Feautes <span style="color:red;">**</span></label>
                  <textarea class="form-control" id="editor1" rows="3" name="key_features">{{ $product->key_features }}</textarea>
               </div>
               <div class="form-group">
                  <label class="control-label">Specifications <span style="color:red;">**</span></label>
                  <textarea class="form-control" id="editor2" rows="3" name="specifications">{{ $product->specifications }}</textarea>
               </div>
               <div class="form-group">
                  <label class="control-label">Description <span style="color:red;">**</span></label>
                  <textarea class="form-control" id="editor3" rows="3" name="description">{{ $product->description }}</textarea>
               </div>               
            </div>
         </div>
      </div>
   </div>
   <div class="tile-footer">            
      <button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</button>
      &nbsp;&nbsp;&nbsp;
      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
   </div>
</form>
@endsection
@push('js')
<script type="text/javascript" src="{{ asset('backend/assets/js/plugins/select2.min.js')}}"></script>
<script>
   $('.select2').select2();

   function findSubCategory(){
      var category_id = $("#category_id").val();
      if(category_id){
         let token = $('meta[name="csrf-token"]').attr('content');
            loaderStart();
            $.ajax({
               url: '/admin/product/find-sub-category/' + category_id,
               method: 'GET',
               success: function(result){
                  loaderEnd();
                  $("#sub_category_id").empty().append(result)
               }
            });
      }
   }
</script>
@endpush