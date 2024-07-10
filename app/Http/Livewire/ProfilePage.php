<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;

class ProfilePage extends Component
{
    public $data_page, $profilepage, $getlistpage;
    public function mount($slug){
        $this->profilepage = Page::orderBy('order_position', 'asc')->first();
        $this->data_page = Page::where('slug',$slug)->first();
        $this->getlistpage = Page::orderBy('order_position', 'asc')->whereNotIn('order_position', $this->profilepage)->get();
    }
    public function render()
    {
        return view('livewire.profile-page')->layout('layouts.guest');
    }
}
