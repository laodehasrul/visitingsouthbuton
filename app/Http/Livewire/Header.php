<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Header extends Component
{
    public $nav;
    public function mount()
    {
        $this->nav = Category::where('parent_id', '=', null)
        ->with('childrens')
        ->get();
    }
    public function render()
    {
        return view('livewire.header');
    }
}
