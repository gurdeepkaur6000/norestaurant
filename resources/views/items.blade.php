@extends('layout')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
 
@section('content')
<main class="login-form" ng-app="myApp" ng-controller="myCtrl" ng-init="getTablePostPage(<?php echo $tableid; ?>,<?php echo $orderid; ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1>Order Food</h1>
                <h3>Table - @{{onetnData.table_name}}</h3>
				<div class="col-sm-12" style="margin-bottom: 20px;">
					<select class="form-control section" id="item-category" ng-select="getPostsFromCat();">
						<option value="">Select Category</option>
						<option ng-repeat="categoryDataR in categoryData" value="@{{categoryDataR.id}}">@{{categoryDataR.title}}</option>
					</select>
				</div>
				<div class="col-sm-12" style="margin-bottom: 20px;">
					<select class="form-control section" ng-show="subcategoryData"  ng-select="getPostsFrom(subcategoryDataR);" >
						<option value="">Select Sub-category</option>
						<option ng-repeat="subcategoryDataR in subcategoryData" value="@{{subcategoryDataR.id}}">@{{subcategoryDataR.title}}</option>
					</select>
				</div>
				<div class="col-sm-12" style="margin-bottom: 20px;">
					<div class="product" ng-show="postData" ng-repeat="product in postData" >
		        		<div class="textboxmain">
							<div class="titleproduct item">@{{ product.title }}</div>
							<p class="titleproduct price">$@{{ product.price }}</p>
							<div>
							    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
							        @csrf
							        <input type="hidden" value="@{{ product.id }}" name="id">
							       	<input type="hidden" value="@{{ tableid }}" name="tableid">
							       	<input type="hidden" value="@{{ orderid }}" name="orderid">
							       	
							       	<input type="hidden" value="@{{ product.title }}" name="name">
							        <input type="hidden" value="@{{ product.price }}" name="price">
							        <input type="hidden" value=""  name="image">
							        <input type="text" value="" name="quantity" required>
							        <button class="">Add</button>
							    </form>
							</div>
							    </div>
					</div>
				</div>
			
				
				
				
          </div>
      	</div>
  </div>
</main>
@endsection