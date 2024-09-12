<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryMenu extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::with('children')->whereNull('parent_id')->get();
    }

    public function render()
    {
        return view('livewire.category-menu');
    }
}
