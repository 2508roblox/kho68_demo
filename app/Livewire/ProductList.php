<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\SocialAccount;
use App\Models\Course;
use App\Models\OtherProduct;
use App\Models\WordpressProduct;

class ProductList extends Component
{
    public $categorySlug;
    public $categoryName;
    public $socialAccounts = [];
    public $courses = [];
    public $otherProducts = [];
    public $wordpressProducts = [];

    // Nhận 'slug' từ route
    public function mount($slug)
    {
        $this->categorySlug = $slug;
        $this->loadProducts();
    }

    // Tải danh sách sản phẩm thuộc danh mục dựa trên slug
    public function loadProducts()
    {
        $category = Category::where('slug', $this->categorySlug)->first();

        if ($category) {
            $this->categoryName = $category->name;

            // Lấy các tài khoản xã hội thuộc danh mục đó
            $this->socialAccounts = SocialAccount::where('category_id', $category->id)->with('products')->get();

            // Lấy các khóa học thuộc danh mục đó
            $this->courses = Course::where('category_id', $category->id)->get();

            // Lấy các sản phẩm khác thuộc danh mục đó
            $this->otherProducts = OtherProduct::where('category_id', $category->id)->get();

            // Lấy các sản phẩm Wordpress thuộc danh mục đó
            $this->wordpressProducts = WordpressProduct::where('category_id', $category->id)->get();
        } else {
            // Nếu không tìm thấy danh mục
            $this->socialAccounts = [];
            $this->courses = [];
            $this->otherProducts = [];
            $this->wordpressProducts = [];
        }
    }

    public function render()
    {
        return view('livewire.category-products', [
            'socialAccounts' => $this->socialAccounts,
            'courses' => $this->courses,
            'otherProducts' => $this->otherProducts,
            'wordpressProducts' => $this->wordpressProducts,
        ]);
    }
}
