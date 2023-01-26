<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    public static function getCategoryData()
    {
        $value=DB::table('category')->orderBy('id', 'desc')->get();
        return $value;
    }

    public static function deleteCategoryData($id)
    {
        DB::delete("delete from category where id ='$id'");
    }

    public function postHasOneCategoryBelongs()
    {
        //$article=Article::with("comment")->first();
        return $this->hasOne(Category::class);
    }

    
}
