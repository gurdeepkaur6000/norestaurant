@extends('layout')
  
@section('content')

<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Orders') }}</h3>
                </div>
  
                <div class="card-body">
                    <table border='1' style='border-collapse: collapse;'  class="table">
                      <thead>
                        <tr>
                          <th scope="col">Category</th>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Price</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      @foreach($allorders as $allordersR)
                      <tr>
                        <td>{{ $allordersR->category_id }}</td>
                        <td>{{ $allordersR->title }}</td>
                        <td>{{ $allordersR->description }}</td>
                        <td>{{ $allordersR->price }}</td>
                        <td>
                          <a href="{{ url('edit-post') }}/{{ $allordersR->id }}" class="btn btn-success float-end">
                            <i class="fa fa-invoice"></i>
                          </a>
                          
                        </td>
                      </tr>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection