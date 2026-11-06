<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'name',
        'category',
        'price',
        'description',
        'image',
        'is_available',
    ];

    protected $casts = [
        'price' => 'integer',
        'is_available' => 'boolean',
    ];
}