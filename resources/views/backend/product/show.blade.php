@extends('backend.layouts')
@section('title')
Product
@endsection

@section('breadcrumb')
<div class="app-title">
    <div>
      <h1><i class="fa fa-bell-o"></i> Product Details</h1>
      <p>Application Product Details</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Product  Show</a></li>
    </ul>
  </div>
@endsection

@section('content')

<a href="{{ route('admin.product.index')}}" class="btn btn-primary mb-3"> <i class="fa fa-long-arrow-left"></i> Back</a>

<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
              
              <tbody>
                  <tr>
                    <th>Title</th>
                    <td>{{ $product->title }}</td>
                  </tr>
                  <tr>
                    <th>Slug</th>
                    <td>{{ $product->slug }}</td>
                  </tr>
                  <tr>
                    <th>Product Code</th>
                    <td>{{ $product->product_code }}</td>
                  </tr>
                  <tr>
                    <th>Brand</th>
                    <td>{{ $product->brand->title }}</td>
                  </tr>
                  <tr>
                    <th>Category</th>
                    <td>{{ $product->category->title }}</td>
                  </tr>
                  <tr>
                    <th>Sub-Category</th>
                    <td>{{ $product->sub_category->title }}</td>
                  </tr>
                  <tr>
                    <th>Quantity</th>
                    <td>{{ $product->quantity }}</td>
                  </tr>
                  <tr>
                    <th>Price</th>
                    <td>{{ number_format($product->price,2) }}</td>
                  </tr>
                  <tr>
                    <th>Current Price</th>
                    <td>{{ number_format($product->current_price,2) }}</td>
                  </tr>
                  <tr>
                    <th>Discount Percentage</th>
                    <td>{{ $product->discount_percentage }}%</td>
                  </tr>
                  <tr>
                    <th>Key Features</th>
                    <td>{!! $product->key_features !!}</td>
                  </tr>
                  <tr>
                    <th>Specifications</th>
                    <td>{!! $product->specifications !!}</td>
                  </tr>
                  <tr>
                    <th>Description</th>
                    <td>{!! $product->description !!}</td>
                  </tr>
                  @if(isset($product->image)) 
                    <th>Image</th>
                    <td><img class="img-thumbnail" style="cursor: pointer" onclick="imagePreviewModal('{{ asset($product->image) }}')"  alt="200x200" width="200" src="{{ asset($product->image) }}" data-holder-rendered="true"></td>
                        
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