<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'product_id', 'your_name','email','comment','status','star_rating',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
