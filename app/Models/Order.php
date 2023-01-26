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
    	$value=DB::table('order')->where('id',$order_id)->orderBy('id', 'asc')->first();
    	return $value;
    }

    
}
