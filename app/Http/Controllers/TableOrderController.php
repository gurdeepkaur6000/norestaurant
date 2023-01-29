<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\TableOrder;
use App\Models\TableNumber;
use App\Models\Order;
use App\Helpers\Helpers;

class TableOrderController extends Controller
{
	public function showTableNumberData()
    {
        // Read value from Model method
        //$tnData = TableNumber::getTNData();
        // Pass to view

        \Cart::clear();

        return view('home');
    }

    public function getTableNumberData()
    {
        // Read value from Model method
        $tnData = TableNumber::getTNData();
        // Pass to view
        return json_encode($tnData);
    }

    public function showTablePostData($tableid,$orderid)
    {
        // Read value from Model method
        // Pass to view
        return view('items')->with('tableid',$tableid)->with('orderid',$orderid);
    }

    public function getTablePostData(Request $request)
    {
        $input = $request->all();
        $tableid = $input['tableid'];
        $orderid = $input['orderid'];
        // Read value from Model method
        $onetnData = TableNumber::find($tableid);
        $postData = Posts::getPostData();
        $categoryData = Category::getCategoryData();
        $subcategoryData = Category::getSubCategoryData();
        $cartItems = \Cart::getContent();

        $arr = array(
            'postData'=>$postData,
            'categoryData'=>$categoryData,
            'subcategoryData'=>$subcategoryData,
            'cartItems'=>$cartItems,
            'onetnData'=>$onetnData
        );

        // Pass to view
        return json_encode($arr);
    }

	public function cartList($tableid,$orderid)
    {
        $cartItems = \Cart::getContent();
        if(count($cartItems)>0)
        {
            return view('cart')->with('tableid',$tableid)->with('orderid',$orderid)->with('cartItems',$cartItems);
        	//return view('cart', compact('cartItems'));
        }
        else
        {
            return redirect('/home');
            //(new TableOrderController)->showTableOrderData();
        	//$this->showTableOrderData();
        }
        
    }


    public function addToCart(Request $request)
    {
        //dd("nnnn");
        $tableid = $request->tableid;
        $orderid = $request->orderid;

        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        session()->flash('success', 'Item is Added to Cart Successfully !');

        $cartItems = \Cart::getContent();

        $update_orderid = cartOrderCommonDB($tableid,$orderid,$cartItems);

        return redirect('/cart/'.$tableid.'/'.$update_orderid);

        //return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        $tableid = $request->tableid;
        $orderid = $request->orderid;

        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        $cartItems = \Cart::getContent();

        $update_orderid = cartOrderCommonDB($tableid,$orderid,$cartItems);

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect('/cart/'.$tableid.'/'.$update_orderid);

        //return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        $tableid = $request->tableid;
        $orderid = $request->orderid;

        \Cart::remove($request->id);

        $cartItems = \Cart::getContent();

        $update_orderid = cartOrderCommonDB($tableid,$orderid,$cartItems);

        session()->flash('success', 'Item Cart Remove Successfully !');

        //return redirect()->route('cart.list');
        return redirect('/cart/'.$tableid.'/'.$update_orderid);
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

    public function clearAllCart(Request $request)
    {
        $tableid = $request->tableid;
        $orderid = $request->orderid;

        \Cart::clear();

        $cartItems = \Cart::getContent();

        $update_orderid = cartOrderCommonDB($tableid,$orderid,$cartItems);

        session()->flash('success', 'All Item Cart Clear Successfully !');

        //return redirect()->route('cart.list');
        return redirect('/items/'.$tableid.'/'.$update_orderid);
    }

    public function viewOrderData()
    {
    	$allorders = Order::getAllOrderData();

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
