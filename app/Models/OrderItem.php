<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'social_account_product_id',
        'wordpress_product_id',
        'course_product_id',
        'attribute_id',
        'other_product_id',
        'quantity',
        'price',
        'subtotal',
    ];

    // Quan hệ n-1 với bảng orders
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Quan hệ n-1 với bảng social_account_product
    public function socialAccountProduct()
    {
        return $this->belongsTo(SocialAccountProduct::class);
    }

    // Quan hệ n-1 với bảng wordpress_product
    public function wordpressProduct()
    {
        return $this->belongsTo(WordpressProduct::class);
    }

    // Quan hệ n-1 với bảng course_product
    public function courseProduct()
    {
        return $this->belongsTo(Course::class);
    }

    // Quan hệ n-1 với bảng attribute (nếu có)
    public function attribute()
    {
        return $this->belongsTo(SocialAccountProductAttribute::class);
    }
}
