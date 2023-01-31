@extends('backend/layout')
  
@section('content')

<div class="container" ng-app="myApp" ng-controller="myHash">
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
                          <th scope="col">OrderID </th>
                          <th scope="col">Table Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">GST</th>
                          <th scope="col">Final Price</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      @foreach($allorders as $allordersR)
                      <tr>
                        <td>{{ $allordersR->id }} 
                          
                        </td>
                        <td>{{ $allordersR->table_name }}</td>
                        <td>{{ $allordersR->total_price }}</td>
                        <td>{{ $allordersR->gst }}</td>
                        <td>{{ $allordersR->final_price }}</td>
                        <td>
                          <a href="javascript://" ng-click="showSub({{ $allordersR->id }});" class="btn btn-primary">
                            View Items
                          </a>
                          <a href="{{ url('delete-invoice') }}/{{ $allordersR->id }}" class="btn btn-danger float-end">
                            Delete
                          </a>
                          <a target="_blank" href="{{ url('invoice') }}/{{ $allordersR->id }}" class="btn btn-success float-end">
                            Invoice
                          </a>
                          
                        </td>
                      </tr>
                      
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>



  <div class="modal fade" id="orderdetailitemsall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <table style="width: 100%;">
            <tr>
              <td><h4>Item Name</h4></td>
              <td><h4>Unit Price</h4></td>
              <td><h4>Quantity</h4></td>
              <td><h4>Price</h4></td>
            </tr>
            <tr ng-repeat="tableOrderDetailR in tableOrderDetail">
              <td>@{{tableOrderDetailR.title}}</td>
              <td>$@{{tableOrderDetailR.unit_price}}</td>
              <td>@{{tableOrderDetailR.quantity}}</td>
              <td>$@{{tableOrderDetailR.price}}</td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


@endsection