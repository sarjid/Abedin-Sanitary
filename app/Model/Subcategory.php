<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'category_id','subcategory_name', 'subcategory_slug', 'status',
    ];

    public function category(){
       return $this->belongsTo(Category::class,'category_id');
    }
}
