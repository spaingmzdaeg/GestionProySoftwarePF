@extends('admin.layouts.template')
@section('page_title')
Add SubCategory - Single Ecom
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page /</span> Add SubCategory</h4>
<div class="container">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Add New Sub Category</h5>
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
            <form action="{{route('storesubcategory')}}" method="POST">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">SubCategory Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="SubCategory" />
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                <div class="col-sm-10">
                    <label for="defaultSelect" class="form-label">Category</label>
                    <select id="category_id" name="category_id" class="form-select">
                      <option selected>Open this select menu</option>
                      @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    class="form-control"
                    id="basic-default-company"
                    placeholder="ACME Inc."
                  />
                </div>
              </div> --}}
              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-merge">
                    <input
                      type="text"
                      id="basic-default-email"
                      class="form-control"
                      placeholder="john.doe"
                      aria-label="john.doe"
                      aria-describedby="basic-default-email2"
                    />
                    <span class="input-group-text" id="basic-default-email2">@example.com</span>
                  </div>
                  <div class="form-text">You can use letters, numbers & periods</div>
                </div>
              </div> --}}
              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone No</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    id="basic-default-phone"
                    class="form-control phone-mask"
                    placeholder="658 799 8941"
                    aria-label="658 799 8941"
                    aria-describedby="basic-default-phone"
                  />
                </div>
              </div> --}}
              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                <div class="col-sm-10">
                  <textarea
                    id="basic-default-message"
                    class="form-control"
                    placeholder="Hi, Do you have a moment to talk Joe?"
                    aria-label="Hi, Do you have a moment to talk Joe?"
                    aria-describedby="basic-icon-default-message2"
                  ></textarea>
                </div>
              </div> --}}
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Add SubCategory</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>
</div>
@endsection