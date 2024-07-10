<?php

namespace App\Http\Livewire;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class VideoModal extends Component
{
    use WithPagination;
    public $data_video, $title, $url_video, $description;
    public $search = '';

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
        $this->reset();
        $this->isModalOpen = false;
    }
    public function render()
    {
        sleep(1);
        $videos = Video::where('title', 'like', '%'. $this->search .'%')
        ->orWhere('description', 'like', '%'. $this->search .'%')
        ->latest()->take($this->amount)->get();
        return view('livewire.video-modal', ['videos' => $videos])->layout('layouts.guest');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function showModal(Video $video)
    {
        $finddata = Video::findOrFail($video);
        $this->dispatch("video-modal", name: "video-modal");
    }
}
