<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\EventComment;
use App\Models\EventLikeComment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Comment extends Component
{
    public $body, $body2, $getevent, $edit_comment_id, $comment_id;
    public $hasReplies = false;

    public function mount($id)
    {
        $this->getevent = Event::find($id);
    }

    public function render()
    {
        return view('livewire.event.comment', [
            'comments' => EventComment::with(['user', 'childrens'])
                ->where('event_id', $this->getevent->id)
                ->whereNull('event_comment_id')->get(),
            'total_comment' => EventComment::where('event_id', $this->getevent->id)->count(),
        ]);
    }

    public function storecomment()
    {
        if (Auth::check()) {
            $this->validate([
                'body' => 'required'
            ]);
            $comment = EventComment::create([
                'user_id' => Auth::user()->id,
                'event_id' => $this->getevent->id,
                'body' => $this->body,
            ]);
            if ($comment) {
                session()->flash('success', 'komentar berhasil terkirim');
                $this->emit('comment_store', $comment->id);
                $this->body = NULL;
            } else {
                session()->flash('danger', 'komentar gagal terkirim');
                return redirect()->route('getevent', $this->getevent->slug);
            }
        } else {
            $this->dispatchBrowserEvent('error', [
                'html' => 'Anda tidak memiliki akses ke fitur ini! Silahkan Login/Daftar terlebih dahulu.',
                'timer'=>3000,
                'icon'=>'info',
                'toast'=>true,
                'position'=>'center',
                'showCloseButton'=>true,
                'showCancelButton'=>true,
                'focusConfirm'=>false
            ]);
            $this->body = NULL;
        }
    }
    public function commentEdit($id)
    {
        $comment = EventComment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->body2 = $comment->body;
    }
    public function changecomment()
    {
        $this->validate([
            'body2' => 'required'
        ]);
        $comment = EventComment::where('id', $this->edit_comment_id)->update([
            'body' => $this->body2,
        ]);
        if ($comment) {
            session()->flash('success', 'komentar berhasil terkirim');
            $this->emit('comment_store', $this->edit_comment_id);
            $this->body = NULL;
            $this->edit_comment_id = NULL;
        } else {
            session()->flash('danger', 'komentar gagal diubah');
            return redirect()->route('getevent', $this->getevent->slug);
        }
    }
    public function deletecomment($id)
    {
        $comment = EventComment::where('id', $id)->delete();
        if ($comment) {
            return NULL;
        } else {
            session()->flash('danger', 'komentar gagal dihapus');
            return redirect()->route('getevent', $this->getevent->slug);
        }
    }
    public function selectReply($id)
    {
        $this->comment_id = $id;
        $this->edit_comment_id = NULL;
        $this->body2 = NULL;
    }
    public function replycomment()
    {
        $this->validate([
            'body2' => 'required'
        ]);
        $comment = EventComment::find($this->comment_id);
        $comment = EventComment::create([
            'user_id' => Auth::user()->id,
            'event_id' => $this->getevent->id,
            'body' => $this->body2,
            'event_comment_id' => $comment->event_comment_id ? $comment->event_comment_id : $comment->id,
        ]);
        if ($comment) {
            session()->flash('success', 'komentar berhasil terkirim');
            $this->emit('comment_store', $comment->id);
            $this->body2 = NULL;
            $this->comment_id = NULL;
        } else {
            session()->flash('danger', 'komentar gagal terkirim');
            return redirect()->route('getevent', $this->getevent->slug);
        }
    }
    public function like($id)
    {
        $data = [
            'event_comment_id' => $id,
            'user_id' => Auth::user()->id,
        ];
        $like = EventLikeComment::where($data);
        if ($like->count() > 0) {
            $like->delete();
        } else {
            EventLikeComment::create($data);
        }
        return NULL;
    }
}
