<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [ 'name' ,'abbr', 'value', 'mandatory'];

    public static function getValidId()
    {
       if(isset(\App\Category::latest()->get()->first()->id))
       {
         return \App\Category::latest()->get()->first()->id + 1;
       }
       else {
         return 1;
       }
    }
    public static function fullMark()
    {
       $categories = \App\Category::all();

       $sum = 0;
       foreach ($categories as $category)
       {
         $values = explode(",",$category->value);
         $max = 0;
         foreach ($values as $value) {
           if($value >= $max)
           {
             $max = $value;
           }
         }

         $sum += $max;
       }

       return $sum;
    }
}
