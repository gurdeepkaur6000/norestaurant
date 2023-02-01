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
					<select class="form-control section" id="item-category" ng-model="itemcategory" ng-change="getPostsFromCat();">
						<option value="">Select Category</option>
						<option ng-repeat="categoryDataR in categoryData" value="@{{categoryDataR.id}}">@{{categoryDataR.title}}</option>
					</select>
				</div>
				<div class="col-sm-12" style="margin-bottom: 20px;" ng-show="subcategoryDataSelect.length>0">
					<select class="form-control section" id="item-post" ng-model="itemsubcategory" ng-model="subcategoryData"  ng-change="getPostsFrom();" >
						<option value="">Select Sub-category</option>
						<option ng-repeat="subcategoryDataSelectR in subcategoryDataSelect" value="@{{subcategoryDataSelectR.id}}">@{{subcategoryDataSelectR.title}}</option>
					</select>
				</div>
				<div class="col-sm-12" style="margin-bottom: 20px;" ng-show="subpostDataSelect.length>0">
					<div class="product" ng-repeat="product in subpostDataSelect" >
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