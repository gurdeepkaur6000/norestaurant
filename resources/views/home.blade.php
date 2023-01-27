@extends('layout')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}" />
 
@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1>Order Food</h1>
                
				@foreach ($categoryData as $categoryDataR)
				<div class="listing-section">
					<h3>{{$categoryDataR->title}}</h3>
        			@foreach ($postData as $product)
	        			@if($product->category_id==$categoryDataR->id)
	        			<div class="product">
	        				<div class="textboxmain">
						        <div class="titleproduct item">{{ $product->title }}</div>
						        <p class="titleproduct price">${{ $product->price }}</p>
						        <div>
						        	<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
						            @csrf
						            <input type="hidden" value="{{ $product->id }}" name="id">
						            <input type="hidden" value="{{ $product->title }}" name="name">
						            <input type="hidden" value="{{ $product->price }}" name="price">
						            <input type="hidden" value=""  name="image">
						            <input type="text" value="" name="quantity" required>
						            <button class="">Add</button>
						        	</form>
						    	</div>
						    </div>
					    </div>
					    @endif
				    @endforeach
				</div>
				    @endforeach
				
				
          </div>
      	</div>
  </div>
</main>
@endsection