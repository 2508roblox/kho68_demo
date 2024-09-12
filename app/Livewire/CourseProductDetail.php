<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Course;

class CourseProductDetail extends Component
{
    public $course;
    public $quantity = 1; // Số lượng mặc định là 1

    public function mount($slug)
    {
        $this->course = Course::where('slug', $slug)->firstOrFail();
    }

    public function addToCart()
    {
        // Kiểm tra nếu user đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Tìm giỏ hàng của user hoặc tạo mới nếu chưa có
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('course_product_id', $this->course->id)
            ->first();

        if ($cartItem) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $cartItem->update([
                'quantity' => $cartItem->quantity + $this->quantity,
                'price' => $this->course->price,
            ]);
        } else {
            // Nếu chưa có, tạo mới cart item
            CartItem::create([
                'cart_id' => $cart->id,
                'course_product_id' => $this->course->id, // Thêm dòng này
                'quantity' => $this->quantity,
                'price' => $this->course->price,
            ]);

        }

        // Tính tổng giỏ hàng
        $cart->update([
            'total' => $cart->items->sum(function ($item) {
                return $item->quantity * $item->price;
            }),
        ]);

        session()->flash('message', 'Khóa học đã được thêm vào giỏ hàng!');


    }

    public function render()
    {
        return view('livewire.course-product-detail', [
            'course' => $this->course
        ]);
    }

    private function emit(string $string, string $string1) {}
}
