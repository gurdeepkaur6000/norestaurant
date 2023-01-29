@extends('layout')
  
@section('content')

<div class="container">
    <div class="row">
        @include('backend.sidebar')
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Orders') }}</h3>
                </div>
  
                <div class="card-body">
                    <table border='1' style='border-collapse: collapse;'  class="table">
                      <thead>
                        <tr>
                          <th scope="col">OrderID</th>
                          <th scope="col">Table Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">GST</th>
                          <th scope="col">Final Price</th>
                        </tr>
                      </thead>
                      @foreach($allorders as $allordersR)
                      <tr>
                        <td>{{ $allordersR->id }}</td>
                        <td>{{ $allordersR->table_name }}</td>
                        <td>{{ $allordersR->total_price }}</td>
                        <td>{{ $allordersR->gst }}</td>
                        <td>{{ $allordersR->final_price }}</td>
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