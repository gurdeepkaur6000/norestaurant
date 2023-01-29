<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    public static function getOrderDataOrderID($order_id)
    {
    	$value=DB::table('order')
        ->join('tablenumber', 'tablenumber.id', '=', 'order.tablenumber_id')
        ->select('order.*', 'tablenumber.table_name') 
        ->where('order.id',$order_id)
        ->orderBy('order.id', 'asc')->first();
    	return $value;
    }

    public static function getAllOrderData()
    {
    	$value=DB::table('order')
    	->join('tablenumber', 'tablenumber.id', '=', 'order.tablenumber_id')
        ->select('order.*', 'tablenumber.table_name')             
    	->get();
    	return $value;
    }

    
}
