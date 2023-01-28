<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Posts extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    public static function getPostData()
    {
    	$value=DB::table('posts')
        ->join('category as c', 'c.id', '=', 'posts.category_id')
        ->leftJoin('category as c1', 'c1.id', '=', 'posts.sub_category_id')
        ->select('posts.*','c.title as category_name','c1.title as sub_category_name')
        ->orderBy('posts.id', 'asc')->get();
    	return $value;
    }

    public static function deletePostData($id)
    {
        DB::delete("delete from posts where id ='$id'");
    }
}
