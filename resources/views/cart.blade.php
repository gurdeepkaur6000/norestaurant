@extends('layout')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}" />

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1>Order Items </h1>				
                @if ($message = Session::get('success'))
                <div class="p-4 mb-3 bg-green-400 rounded">
                    <p class="text-green-800">{{ $message }}</p>
                </div>
                @endif
                <div class="shopping-cart">

                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                            <thead>
                                <tr class="h-12 uppercase">
                                  <th class="hidden md:table-cell"></th>
                                  <th class="text-left">Name</th>
                                  <th class="pl-5 text-left lg:text-right lg:pl-0">
                                    <span class="lg:hidden" title="Quantity">Qtd</span>
                                    <span class="hidden lg:inline">Quantity</span>
                                  </th>
                                  <th class="hidden text-right md:table-cell"> price</th>
                                  <th class="hidden text-right md:table-cell"> Remove </th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($cartItems as $item)
                                <tr class="product">
                                    {{--<td class="hidden pb-4 md:table-cell">
                                    <a href="#">
                                      <img src="{{ $item->attributes->image }}" class="w-20 rounded" alt="Thumbnail">
                                    </a>
                                    </td>--}}
                                    <td class="product-title">
                                        <a href="#">
                                          <p class="mb-2 md:ml-4 text-purple-600 font-bold">{{ $item->name }}</p>
                                          
                                        </a>
                                    </td>
                                    <td class="justify-center mt-6 md:justify-end md:flex">
                                    <div class="h-10 w-28">
                                      <div class="relative flex flex-row w-full h-8">
                                        
                                        <form action="{{ route('cart.update') }}" method="POST">
                                          @csrf
                                          <input type="hidden" name="id" value="{{ $item->id}}" >
                                        <input type="text" name="quantity" value="{{ $item->quantity }}" 
                                        class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                                        <button class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">Update</button>
                                        </form>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="hidden text-right md:table-cell">
                                    <span class="text-sm font-medium lg:text-base">
                                        ${{ $item->price }}
                                    </span>
                                  </td>
                                  <td class="hidden text-right md:table-cell">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                      @csrf
                                      <input type="hidden" value="{{ $item->id }}" name="id">
                                      <button class="px-4 py-2 text-black bg-red-600 shadow rounded-full">x</button>
                                  </form>
                                    
                                  </td>
                                </tr>
                                @endforeach
                                 
                              </tbody>
                        </table>
                </div>
                <div>
                    Total: ${{ Cart::getTotal() }}
                </div>
                <div>
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button class="px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Clear Carts</button>
                    </form>
                </div>
                <div>

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
            </div>
        </div>
    </div>
</main>
@endsection