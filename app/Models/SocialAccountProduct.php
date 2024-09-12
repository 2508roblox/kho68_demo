<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccountProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'stock',
        'sold',
        'price',
        'short_content',
        'long_content',
        'data_account',
        'social_account_id'
    ];

    public function socialAccount()
    {
        return $this->belongsTo(SocialAccount::class);
    }

    public function attributes()
    {
        return $this->hasMany(SocialAccountProductAttribute::class, 'social_product_id');
    }

	public function getFirstMediaUrl(string $string) {}

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_social_account_product');
    }
}
