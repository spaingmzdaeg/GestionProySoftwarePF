@extends('admin.layouts.template')
@section('page_title')
Buy to provider - Single Ecom
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page</span> Buy to provider</h4>
<div class="container">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Buy to provider</h5>
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
            <form action="{{route('buytoprovider')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" value="{{$productinfo->id}}" name="id">
              

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Quantity to Buy</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="quantity" name="quantity" value="{{$productinfo->quantity}}" />
                </div>
              </div>

              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Minimium Stock Required</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="minimium_stock" name="minimium_stock" value="{{$productinfo->minimium_stock}}" />
                </div>
              </div> --}}


              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>
</div>
@endsection