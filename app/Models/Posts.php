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
    	$value=DB::table('posts')->orderBy('id', 'asc')->get();
    	return $value;
    }

    public function postHasOneCategory(){
        return $this->hasOne(Category::class);
    }

    public static function deletePostData($id)
    {
        DB::delete("delete from posts where id ='$id'");
    }
}
