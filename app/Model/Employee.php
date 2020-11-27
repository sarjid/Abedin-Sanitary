<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_name', 'position','image','facebook','twitter','instagram', 'status',
    ];
}
