@extends('layout')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" />

@section('content')
<main class="login-form">
  <!--- container starts -->
  <div class="container">
    <!--- row starts -->
    <div class="row justify-content-center">
      <h1>Order Items </h1> 
      @if ($message = Session::get('success'))
      <div class="col-md-12 text-center">
        <p>{{ $message }}</p>
      </div>
      @endif

      <!-- clear cart starts -->
      <div class="col-sm-12 text-right">
          <form action="{{ route('cart.clear') }}" method="POST">
          @csrf
            <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Clear Carts</button>
          </form>
      </div>
      <!-- clear cart ends -->

      <!-- shopping cart starts -->
      <div class="col-sm-12 shopping-cart">
        <div class="col-sm-12">
          <label class="col-sm-3">Name</label>
          <label class="col-sm-2">Quantity</label>
          <label class="col-sm-3"> price</label>
          <label class="col-sm-2"> Remove </label>
        </div>
        @foreach ($cartItems as $item)
        <div class="col-sm-12">
          <div class="col-sm-3">{{ $item->name }}</div>
          <div class="col-sm-2">
            <form action="{{ route('cart.update') }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $item->id}}" >
              <input type="text" name="quantity" value="{{ $item->quantity }}"  class="" />
              <button class="">Update</button>
            </form>
          </div>
          <div class="col-sm-3">${{ $item->price }}</div>
          <div class="col-sm-2">
            <form action="{{ route('cart.remove') }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $item->id }}" name="id">
              <button class="remove-product">x</button>
            </form>
          </div>
        </div>
        @endforeach
      </div>
      <!-- shopping cart ends -->

      <!--- place order starts -->
      <div class="col-sm-12 text-center">
        <div>Total: ${{ Cart::getTotal() }}</div>        
        <form action="{{ route('cart.order') }}" method="POST">
          @csrf
          <select name="tablenumber">
            <option value="1">Table 1</option>
            <option value="2">Table 2</option>
            <option value="3">Table 3</option>
            <option value="4">Table 4</option>
            <option value="5">Table 5</option>
            <option value="6">Table 6</option>
          </select>
          <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Place Order</button>
        </form>
      </div>
      <!--- place order ends -->

    </div>
    <!--- row starts -->
  </div>
  <!--- container ends -->
</main>
@endsection