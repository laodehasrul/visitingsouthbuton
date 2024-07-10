<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;

class ProfileDinas extends Component
{
    public function render()
    {
        $getpage = Page::orderBy('order_position', 'asc')->first();
        
        $getlistpage = Page::orderBy('order_position', 'asc')->get();
        return view('livewire.profile-dinas',[
            'getpage' => $getpage,
            'getlistpage' => $getlistpage
        ])->layout('layouts.guest');
    }
}
