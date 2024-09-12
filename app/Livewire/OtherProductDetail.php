<?php

    namespace App\Livewire;

    use App\Models\Cart;
    use App\Models\CartItem;
    use App\Models\OtherProduct;
    use Illuminate\Support\Facades\Auth;
    use Livewire\Component;

    class OtherProductDetail extends Component
    {
        public $otherProduct;
        public $quantity = 1; // Số lượng mặc định là 1

        public function mount($slug)
        {
            $this->otherProduct = OtherProduct::where('slug', $slug)->firstOrFail();
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
                ->where('other_product_id', $this->otherProduct->id)
                ->first();

            if ($cartItem) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                $cartItem->update([
                    'quantity' => $cartItem->quantity + $this->quantity,
                    'price' => $this->otherProduct->price,
                ]);
            } else {
                // Nếu chưa có, tạo mới cart item
                CartItem::create([
                    'cart_id' => $cart->id,
                    'other_product_id' => $this->otherProduct->id,
                    'quantity' => $this->quantity,
                    'price' => $this->otherProduct->price,
                ]);
            }

            // Cập nhật tổng giỏ hàng
            $cart->update([
                'total' => $cart->items->sum(function ($item) {
                    return $item->quantity * $item->price;
                }),
            ]);

            // Phát sự kiện
            $this->emit('otherProductAddedToCart', 'Sản phẩm đã được thêm vào giỏ hàng.');
        }

        public function render()
        {
            return view('livewire.other-product-detail');
        }

        private function emit(string $string, string $string1) {}
    }
