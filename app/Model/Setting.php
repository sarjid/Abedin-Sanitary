<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'logo','customer_support', 'opening_hour', 'address_english','facebook_link','twitter_link','instagram_link','linkedin_link',
    ];
}
