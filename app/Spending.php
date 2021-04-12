<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    protected $fillable = [
        'category',
        'day',
        'money',
    ];

    // 
    public function income(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    // カテゴリーIDからカテゴリー名を取得
    public function categoryName($category_id)
    {
        return Category::where('category_id','=',$category_id)->value('name');
    }
}
