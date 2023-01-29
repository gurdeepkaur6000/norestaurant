@extends('layout')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
 
@section('content')
<main class="login-form" ng-app="myApp" ng-controller="myCtrl" ng-init="getTablePostPage(<?php echo $tableid; ?>,<?php echo $orderid; ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1>Order Food</h1>
                <h3>Table - @{{onetnData.table_name}}</h3>
				<select class="section"  ng-select>
					<option ng-repeat="categoryDataR in categoryData" value="@{{categoryDataR.id}}">@{{categoryDataR.title}}</option>
				</select>

				<select class="section"  ng-select>
					<option ng-repeat="subcategoryDataR in subcategoryData" value="@{{subcategoryDataR.id}}">@{{subcategoryDataR.title}}</option>
				</select>

				<div class="product" ng-repeat="product in postData">
	        		<div class="textboxmain">
						<div class="titleproduct item">@{{ product.title }}</div>
						<p class="titleproduct price">$@{{ product.price }}</p>
						<div>
						    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
						        @csrf
						        <input type="text" value="@{{ product.id }}" name="id">
						       	<input type="text" value="@{{ tableid }}" name="tableid">
						       	<input type="text" value="@{{ orderid }}" name="orderid">
						       	
						       	<input type="text" value="@{{ product.title }}" name="name">
						        <input type="text" value="@{{ product.price }}" name="price">
						        <input type="text" value=""  name="image">
						        <input type="text" value="" name="quantity" required>
						        <button class="">Add</button>
						    </form>
						</div>
						    </div>
				</div>
			
				
				
				
          </div>
      	</div>
  </div>
</main>
@endsection