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
        $value=DB::table('category')->where('parent_id',0)->orderBy('id', 'desc')->get();
        return $value;
    }

    public static function getSubCategoryData()
    {
        $value=DB::table('category as c')
        ->join('category as c1', 'c1.id', '=', 'c.parent_id')
        ->select('c.*','c1.title as category_name')
        ->where('c.parent_id','!=',0)->orderBy('c.id', 'desc')->get();
        return $value;
    }

    public static function getSubCategoryDataByID($id)
    {
        $value=DB::table('category as c')
        ->join('category as c1', 'c1.id', '=', 'c.parent_id')
        ->select('c.*','c1.title as category_name')
        ->where('c.parent_id',$id)->orderBy('c.id', 'desc')->get();
        return $value;
    }

    public static function deleteCategoryData($id)
    {
        DB::delete("delete from category where id ='$id'");
    }

    public static function deleteSubCategoryData($id)
    {
        DB::delete("delete from category where id ='$id'");
    }

    

    
}
