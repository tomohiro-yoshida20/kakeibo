<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // 
    public function categoryName($category_id)
    {
        $categoryName = Category::all();
        return $categoryName;
    }
}
