<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'category_id','subcategory_id', 'company_id', 'service_id','product_name','product_slug','short_description','long_description','image_one','image_two','image_three','main_slider','status',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id');
    }

    public function company(){
        return $this->belongsTo(Delar::class,'company_id');
    }

    public function service(){
        return $this->belongsTo(Delarservice::class,'service_id');
    }
}
