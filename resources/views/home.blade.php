@extends('layout')
  
@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1> </h1>
				@foreach ($categoryData as $categoryDataR)
				<div class="col-sm-12 uppercase">
					<h3>{{$categoryDataR->title}}</h3>
				</div>
        		@foreach ($postData as $product)
        			@if($product->category_id==$categoryDataR->id)
        			<div class="row justify-content-center">
				    <div class="col-sm-12">
				        <div class="col-sm-4">{{ $product->title }}</div>
				        <div class="col-sm-4">${{ $product->price }}</div>
				        <div class="col-sm-4">
				        	<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
				            @csrf
				            <input type="hidden" value="{{ $product->id }}" name="id">
				            <input type="hidden" value="{{ $product->title }}" name="name">
				            <input type="hidden" value="{{ $product->price }}" name="price">
				            <input type="hidden" value=""  name="image">
				            <input type="text" value="" name="quantity" required>
				            <button class="col-sm-4 rounded">Add</button>
				        	</form>
				    	</div>
				    </div>
				</div>
				    @endif
				    @endforeach
				    @endforeach
				
				
          </div>
      	</div>
  </div>
</main>
@endsection