<?php

    namespace App\Livewire;

    use App\Models\CartItem;
    use App\Models\Cart;
    use App\Models\WordpressProduct;
    use Illuminate\Support\Facades\Auth;
    use Livewire\Component;

    class WordpressProductDetail extends Component
    {
        public $product;
        public $quantity = 1; // Số lượng mặc định là 1

        public function mount($slug)
        {
            $this->product = WordpressProduct::where('slug', $slug)->firstOrFail();
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
                ->where('wordpress_product_id', $this->product->id)
                ->first();

            if ($cartItem) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
                $cartItem->update([
                    'quantity' => $cartItem->quantity + $this->quantity,
                    'price' => $this->product->price,
                ]);
            } else {
                // Nếu chưa có, tạo mới cart item
                CartItem::create([
                    'cart_id' => $cart->id,
                    'wordpress_product_id' => $this->product->id, // Thêm dòng này
                    'quantity' => $this->quantity,
                    'price' => $this->product->price,
                ]);

            }

            // Tính tổng giỏ hàng
            $cart->update([
                'total' => $cart->items->sum(function ($item) {
                    return $item->quantity * $item->price;
                }),
            ]);

            $this->emit('productAddedToCart', 'Sản phẩm đã được thêm vào giỏ hàng.');

        }

        public function render()
        {
            return view('livewire.wordpress-product-detail', [
                'product' => $this->product
            ]);
        }

        private function emit(string $string, string $string1) {}
    }
