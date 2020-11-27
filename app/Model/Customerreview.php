<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customerreview extends Model
{
    protected $fillable = [
        'customer_name', 'customer_review', 'status',
    ];
}
