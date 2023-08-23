<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        $house = 1;
        $productCount = Product::count();
        $productvalue = Product::count();
        return view('livewire.dashboard', compact('productCount','productvalue'));
    }
}
