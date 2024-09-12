<?php

    namespace App\Livewire;

    use Livewire\Component;
    use App\Models\Cart as CartModel;
    use App\Models\CartItem;
    use App\Models\Course;
    use App\Models\Product;
    use App\Models\SocialAccountProduct;
    use App\Models\OtherProduct;
    use Illuminate\Support\Facades\Auth;

    class Cart extends Component
    {
        public $cart;

        public function mount()
        {
            // Kiểm tra nếu người dùng đã đăng nhập, lấy giỏ hàng hiện tại
            if (Auth::check()) {
                $this->cart = CartModel::firstOrCreate([
                    'user_id' => Auth::id(),
                ]);
            }
        }

        public function addToCart($productId, $quantity = 1, $type = 'wordpress')
        {
            $model = $this->getModelByType($type);
            $product = $model::findOrFail($productId);

            // Check if the product already exists in the cart
            $cartItem = $this->cart->items()->where($type . '_product_id', $product->id)->first();

            if ($cartItem) {
                // If exists, update quantity
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                // If not, create a new cart item
                $this->cart->items()->create([
                    $type . '_product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'type' => $type,
                ]);
            }

            // Update the cart total
            $this->cart->total = $this->cart->items->sum(function ($item) {
                return $item->quantity * $item->price;
            });
            $this->cart->save();

            session()->flash('message', 'Product added to cart!');
        }

        private function getModelByType($type)
        {
            $models = [
                'wordpress' => \App\Models\WordpressProduct::class,
                'course' => \App\Models\Course::class,
                'social' => \App\Models\SocialAccountProduct::class,
                'other' => \App\Models\OtherProduct::class,
            ];

            return $models[$type];
        }

//        public function addToCart($productId, $quantity = 1)
//        {
//            $product = Product::findOrFail($productId);
//
//            $cartItem = $this->cart->items()->where('product_id', $product->id)->first();
//
//            if ($cartItem) {
//                $cartItem->quantity += $quantity;
//                $cartItem->save();
//            } else {
//                $this->cart->items()->create([
//                    'product_id' => $product->id,
//                    'quantity' => $quantity,
//                    'price' => $product->price,
//                ]);
//            }
//
//            $this->cart->total = $this->cart->items->sum(function ($item) {
//                return $item->quantity * $item->price;
//            });
//            $this->cart->save();
//
//            session()->flash('message', 'Sản phẩm đã được thêm vào giỏ hàng!');
//        }

//        public function addCourseToCart($courseId, $quantity = 1)
//        {
//            $course = Course::findOrFail($courseId);
//
//            $cartItem = $this->cart->items()->where('course_product_id', $course->id)->first();
//
//            if ($cartItem) {
//                $cartItem->quantity += $quantity;
//                $cartItem->save();
//            } else {
//                $this->cart->items()->create([
//                    'course_product_id' => $course->id,
//                    'quantity' => $quantity,
//                    'price' => $course->price,
//                ]);
//            }
//
//            $this->cart->total = $this->cart->items->sum(function ($item) {
//                return $item->quantity * $item->price;
//            });
//            $this->cart->save();
//
//            session()->flash('message', 'Khóa học đã được thêm vào giỏ hàng!');
//        }

        public function render()
        {
            return view('livewire.cart', [
                'cartItems' => $this->cart ? $this->cart->items : [],
            ]);
        }
    }
