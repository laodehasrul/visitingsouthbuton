<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class VideoList extends Component
{
    use WithPagination;
    public $data_video, $title, $url_video, $description;
    public $search = '';
    public $orderBy = 'created_at';

    protected $listeners = ['showModal' => 'showModal'];

    public $isModalOpen = false;

    public $amount = 6;

    public function loadMore() {
        $this->amount+=6;
    }

    public function showVideo($id)
    {
        $this->data_video = Video::findOrFail($id);
        $this->title = $this->data_video->title;
        $this->url_video = $this->data_video->url_video;
        $this->description = $this->data_video->description;
        $this->data_video->update([
            'viewer' => $this->data_video->viewer + 1
           ]);
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    public function render()
    {
        sleep(1);
        $this->orderBy = $this->orderBy;
        $videos = Video::where('title', 'like', '%'. $this->search .'%')
        ->orWhere('description', 'like', '%'. $this->search .'%')
        ->orderBy($this->orderBy,'desc')->take($this->amount)->get();
        return view('livewire.video-list', ['videos' => $videos])->layout('layouts.guest');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
