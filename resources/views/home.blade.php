@extends('layout')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
 
@section('content')
<main class="login-form" ng-app="myApp" ng-controller="myCtrl" ng-init="showTableDataPage();">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1>Order Food</h1>
                
				<div class="box-section" ng-repeat="tnDataR in tnData">
					<h3 ng-click="startTableNumber(tnDataR);">@{{tnDataR.table_name}}</h3>
				</div>
				
				
          </div>
      	</div>
  </div>
</main>
@endsection