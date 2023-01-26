<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\TableOrder;
use App\Models\Order;

class TableOrderController extends Controller
{
	public function showTableOrderData()
    {
	    // Read value from Model method
	    $postData = Posts::getPostData();
	    $categoryData = Category::getCategoryData();
        $cartItems = \Cart::getContent();

		// Pass to view
		return view('home')->with("postData",$postData)->with("categoryData",$categoryData)->with("cartItems",$cartItems);
	}

	public function cartList()
    {
        $cartItems = \Cart::getContent();
        if(count($cartItems)>0)
        {
        	return view('cart', compact('cartItems'));
        }
        else
        {
        	//(new TableOrderController)->showTableOrderData();
        	//$this->showTableOrderData();
        }
        
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        $cartItems = \Cart::getContent();

        return redirect('/');

        //return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function orderCart(Request $request)
    {
        $tablenumber = $request->tablenumber;

    	$orderfull = new Order;
 
		$orderfull->total_price = 1;
		$orderfull->final_price = 1;
        $orderfull->tablenumber_id = $tablenumber;
        $orderfull->gst = 1;
 
		$orderfull->save();

		
    	$cartItems = \Cart::getContent();
    	$total_price=0;
    	foreach($cartItems as $cartItemsR)
    	{
    		$tableorder = new TableOrder;
    		$tableorder->item_id = $cartItemsR->id;
    		$tableorder->unit_price = $cartItemsR->price;
    		$tableorder->quantity = $cartItemsR->quantity;
    		$tableorder->price = $cartItemsR->price*$cartItemsR->quantity;
    		$tableorder->order_id = $orderfull->id;
			$tableorder->save();

    		$total_price += $tableorder->price;
    	}
    	$gst =10;
    	$final_price = $gst+$total_price;

    	$orderfinal = Order::find($orderfull->id);

		$orderfinal->total_price = $total_price;
		$orderfinal->final_price = $final_price;
 		$orderfinal->gst = $gst;
 
		$orderfinal->update();

		

		//dd($tableorder);

		\Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

		return redirect('invoice/'.$orderfull->id);

    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }

    public function viewOrderData()
    {
    	$allorders = Order::All();

		// Pass to view
		return view('view-orders')->with("allorders",$allorders);
    }

    public function showInvoiceData($id)
    {
    	$orderDetail = Order::getOrderDataOrderID($id);
    	$tableOrderDetail = TableOrder::getTableOrderDataOrderID($id);

		// Pass to view
		return view('invoice')->with("orderDetail",$orderDetail)->with("tableOrderDetail",$tableOrderDetail);
    }

    


}
