<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class TableNumber extends Model
{
    use HasFactory;

    protected $table = 'tablenumber';

    public static function getTNData()
    {
        $value=DB::table('tablenumber')->orderBy('id', 'desc')->get();
        return $value;
    }

    public static function deleteTNData($id)
    {
        DB::delete("delete from tablenumber where id ='$id'");
    }

}
