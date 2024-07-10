<?php

namespace App\Http\Livewire\Destinasi;

use App\Models\Berita;
use App\Models\Category;
use App\Models\Destination;
use App\Models\DestinationGalery;
use Livewire\Component;

class DestinasiDetail extends Component
{
    public Destination $destination;
    public $previous;
    public $next;
    public $category, $post, $newberita, $galeries, $latitude, $longitude;
    public function mount($category, $post)
    {
        $this->category = $category;
        $this->post = $post;
        $this->newberita = Berita::withCount('totalComments')->with('user')->latest()->limit(5)->get();
        $this->category = Category::where('slug', 'like', '%' . $this->category . '%')->firstOrfail();
        $this->post = Destination::with(['category', 'galeries'])
        ->where('category_id', $this->category->id)
        ->where('slug', $this->post)
        ->first();
        $this->galeries = DestinationGalery::where('destination_id', $this->post->id)
        ->get();
        $this->post->update([
            'viewer' => $this->post->viewer + 1
           ]);
        $this->previous = Destination::with('category')
        ->where('category_id', $this->category->id)
        ->where('id', '<', $this->post->id)
        ->orderBy('id', 'desc')
        ->first();
        $this->next = Destination::with('category')
        ->where('category_id', $this->category->id)
        ->where('id', '>', $this->post->id)
        ->orderBy('id', 'asc')
        ->first();
    }
    public function render()
    {
        
        return view('livewire.destinasi.destinasi-detail')->layout('layouts.guest');
    }
}
