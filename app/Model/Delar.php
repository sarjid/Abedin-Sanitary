<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Delar extends Model
{
    protected $fillable = [
        'company_name', 'company_slug', 'status',
    ];
}
