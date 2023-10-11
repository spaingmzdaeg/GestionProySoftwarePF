@extends('admin.layouts.template')
@section('page_title')
Add Product - Single Ecom
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page</span> Add Product</h4>
<div class="container">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Product</h5>
            <small class="text-muted float-end">Input Information</small>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif 
            <form action="{{route('storeproduct')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short description</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_short_desc" name="product_short_desc" placeholder="" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long description</label>
                <div class="col-sm-10">
                   <textarea class="form-control" name="product_long_desc" id="product_long_desc" cols="60" rows="10"></textarea> 
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="price" name="price" placeholder="00.00" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="quantity" name="quantity" placeholder="1000" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                <div class="col-sm-10">
                    <label for="defaultSelect" class="form-label">Select Category</label>
                    <select id="product_category_id" name="product_category_id" class="form-select">
                      <option selected>Select Product Category</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select SubCategory</label>
                <div class="col-sm-10">
                    <label for="defaultSelect" class="form-label">Select SubCategory</label>
                    <select id="product_subcategory_id" name="product_subcategory_id" class="form-select">
                      <option selected>Select Product Subcategory</option>
                      @foreach ($subcategories as $subcategory)
                      <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" id="form-file" id="product_img" name="product_img" />
                </div>
              </div>
              
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>
</div>
@endsection