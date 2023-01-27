<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TableOrder extends Model
{
    use HasFactory;

    protected $table = 'tableorder';

    public static function getTableOrderDataOrderID($order_id)
    {
    	$value=DB::table('tableorder')
    	->join('posts', 'posts.id', '=', 'tableorder.item_id')
        ->select('tableorder.*', 'posts.title')
               
    	->where('order_id',$order_id)->get();
    	return $value;
    }
}
