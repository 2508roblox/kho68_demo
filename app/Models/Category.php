<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Category extends Model
    {
        use HasFactory;

        protected $fillable = ['name', 'slug', 'parent_id', 'status'];

        // Quan hệ một-nhiều (cha-con) với chính bảng `categories`
        public function children()
        {
            return $this->hasMany(Category::class, 'parent_id');
        }

        // Quan hệ với danh mục cha
        public function parent()
        {
            return $this->belongsTo(Category::class, 'parent_id');
        }

        // Quan hệ với sản phẩm
        public function products()
        {
            return $this->hasMany(Product::class);
        }

        public function socialAccountProducts()
        {
            return $this->belongsToMany(SocialAccountProduct::class, 'category_social_account_product');
        }
    }
