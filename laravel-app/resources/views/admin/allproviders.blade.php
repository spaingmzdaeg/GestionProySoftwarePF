@extends('admin.layouts.template')
@section('page_title')
All Providers - Single Ecom
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page</span> All Providers</h4>
    @if(session()->has('message'))
        <div class="alert alert-success">
          {{ session()->get('message') }}
        </div>
     @endif
<div class="container">
    <div class="card">
        <h5 class="card-header">Avaliable Provider Information</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th>Id</th>
                <th>Provider Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($providers as $provider)
              <tr>
                <td>{{$provider->id}}</td>
                <td>{{$provider->provider_name}}</td>                
                <td>
                  <a href="{{ route('editprovider', $provider->id) }}" class="btn btn-primary">Edit</a>
                  <a href="{{ route('deleteprovider', $provider->id) }}" class="btn btn-warning">Delete</a>
                </td>
              </tr>
              @endforeach          
            </tbody>
          </table>
        </div>
      </div>
</div>
</div>
@endsection