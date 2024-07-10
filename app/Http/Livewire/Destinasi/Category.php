<?php

namespace App\Http\Livewire\Destinasi;

use App\Models\Berita;
use App\Models\Category as ModelsCategory;
use App\Models\Destination;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    public $slug;
    public $search = '';
    public $orderBy = 'created_at';
    public $amount = 6;

    public function loadMore() {
        $this->amount+=6;
    }
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        sleep(1);
        $beritalist = Berita::where('title', 'like', '%' . $this->search . '%')->orWhere('description', 'like', '%' . $this->search . '%')->latest()->paginate(5);
        $category = ModelsCategory::where('slug', 'like', '%' . $this->slug . '%')->firstOrfail();
        $categoryId = $category->id;
        $wisata = Destination::whereHas('category', function ($q) use ($categoryId) {
            $q->where('id', $categoryId)
                ->orWhere('parent_id', $categoryId);
        })
            ->when($this->search, function ($builder) {
                $builder->where(function ($builder) {
                    $builder->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })->withCount('totalComments')->withCount('votes')->with('user')->orderBy($this->orderBy,'desc')
            ->latest()->take($this->amount)->get();
        $newberita = Berita::withCount('totalComments')->with('user')->latest()->limit(5)->get();
        $newdest = Destination::latest()->limit(5)->get();
        return view('livewire.destinasi.category', [
            'newberita' => $newberita,
            'newdest' => $newdest,
            'wisata' => $wisata,
            'category' => $category,
        ])->layout('layouts.guest');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
