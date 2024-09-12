<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'thumbnail',
        'gallery',
        'type',
        'description',
        'demo_link',
        'download_link',
        'price',
        'stock',
        'sold_quantity',
        'system_requirements',
    ];
    protected $casts = [
        'gallery' => 'array', // Cast JSON to array
        'price' => 'decimal:2', // Cast price to decimal with 2 decimal points
    ];
}
