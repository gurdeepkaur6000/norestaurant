<?php

use Carbon\Carbon;
use App\Models\Posts;
use App\Models\Category;
use App\Models\TableOrder;
use App\Models\TableNumber;
use App\Models\Order;
use App\Helpers\Helpers;

function dateformat($date,$format){
		    return Carbon::createFromFormat('Y-m-d', $date)->format($format);    
}

function cartOrderCommonDB($tableid,$orderid,$cartItems)
{
			if($orderid==0) //order create
		    {
		        $orderfull = new Order;
		 
		        $orderfull->total_price = 1;
		        $orderfull->final_price = 1;
		        $orderfull->tablenumber_id = $tableid;
		        $orderfull->gst = 1;
		 
		        $orderfull->save();
		       
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

		        return $orderfull->id;

		    }
		    else //order update
		    {
		        TableOrder::deleteTableOrderByOrderid($orderid);

		        $total_price=0;
		        foreach($cartItems as $cartItemsR)
		        {
		            $tableorder = new TableOrder;
		            $tableorder->item_id = $cartItemsR->id;
		            $tableorder->unit_price = $cartItemsR->price;
		            $tableorder->quantity = $cartItemsR->quantity;
		            $tableorder->price = $cartItemsR->price*$cartItemsR->quantity;
		            $tableorder->order_id = $orderid;
		            $tableorder->save();

		            $total_price += $tableorder->price;
		        }
		        $gst =10;
		        $final_price = $gst+$total_price;

		        $orderfinal = Order::find($orderid);

		        $orderfinal->total_price = $total_price;
		        $orderfinal->final_price = $final_price;
		        $orderfinal->gst = $gst;
		     
		        $orderfinal->update(); 

		        return $orderid;
		    }
		
}

?>