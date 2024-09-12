<?php

    namespace App\Http\Livewire;

    use Livewire\Component;
    use App\Models\Product; // Thay đổi tên mô hình nếu cần

    class ProductSearch extends Component
    {
        public $keyword = '';

        public function render()
        {
            $products = Product::where('name', 'like', '%' . $this->keyword . '%')->get();

            return view('livewire.product-search', [
                'products' => $products,
            ]);
        }
    }
