<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
 
    protected $fillable = [
        'service_name', 'service_details','sevice_icon', 'status',
    ];
}
