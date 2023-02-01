@extends('layout')
  
@section('content')
<main class="login-form" ng-app="myApp" ng-controller="myCtrl" ng-init="getCartPage(<?php echo $tableid; ?>,<?php echo $orderid; ?>);">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <h1>Order Items </h1>				
        @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
          <p class="text-green-800">{{ $message }}</p>
        </div>
        @endif
        <div class="col-sm-12">
          <table class="col-sm-12" cellspacing="0">
            <tr class="h-12 uppercase">
              <td class="text-left"><h3>Name</h3></td>
              <td class=""><h3>Price</h3></td>
              <td class=""><h3>Quantity</h3></td>
              <td class=""><h3>Remove</h3></td>
            </tr>                             
            @foreach ($cartItems as $item)
            <tr>
              <td>
                {{ $item->name }}
              </td>
              <td class="">
                ${{ $item->price }}
              </td>
              <td class="">
                <div class="">
                  <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tableid" value="<?php echo $tableid; ?>" />
                    <input type="hidden" name="orderid" value="<?php echo $orderid; ?>" />
                    <input type="hidden" name="id" value="{{ $item->id}}" >
                    <input type="text" name="quantity" value="{{ $item->quantity }}" class="" />
                    <button class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                  </form>
                </div>
              </td>
              <td class="">
                <form action="{{ route('cart.remove') }}" method="POST">
                  @csrf
                  <input type="hidden" name="tableid" value="<?php echo $tableid; ?>" />
                  <input type="hidden" name="orderid" value="<?php echo $orderid; ?>" />
                  <input type="hidden" value="{{ $item->id }}" name="id">
                  <button class="btn btn-danger">x</button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        <div class="col-sm-12 row">
          	<h4 class="float:right;">Total Amount: ${{ Cart::getTotal() }}</h4>
        </div>
        <div class="col-sm-12 row">
        	<div class="col-sm-6">
        	</div>
          	<div class="col-sm-2">
	          	<form action="{{ route('cart.clear') }}" method="POST">
	            	@csrf
		            <input type="hidden" name="tableid" value="<?php echo $tableid; ?>" />
		            <input type="hidden" name="orderid" value="<?php echo $orderid; ?>" />
		            <button class="btn btn-success float-end">Clear Carts</button>
	          	</form>
	      	</div>
	      	<div class="col-sm-2">
	          	<a href="{{ url('items') }}/<?php echo $tableid; ?>/<?php echo $orderid; ?>">
	            	<button class="btn btn-success float-end">Add Items</button>
	          	</a>
	      	</div>
          	<div class="col-sm-2">
	          	<a href="{{ url('invoice') }}/<?php echo $orderid; ?>">
	            	<button class="btn btn-success float-end">Invoice</button>
	          	</a>
      		</div>
          {{--<form action="{{ route('cart.order') }}" method="POST">
            @csrf
            <input type="text" name="tableid" value="<?php echo $tableid; ?>" />
            <input type="text" name="orderid" value="<?php echo $orderid; ?>" />
            <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Invoice</button>
          </form>--}}
        </div>
      </div>
    </div>
  </div>
</main>
@endsection