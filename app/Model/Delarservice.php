<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Delarservice extends Model
{
    protected $fillable = [
        'company_id', 'delar_product_name','delar_product_slug', 'status',
    ];
    
    public function company(){
        return $this->belongsTo(Delar::class,'company_id');
     }

}
