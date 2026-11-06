<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'label',
        'title',
        'description',
        'image',
        'button_text',
    ];
}