<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{

    protected $fillable = [
        'meta_author', 'meta_description', 'meta_keywords'
    ];
}
