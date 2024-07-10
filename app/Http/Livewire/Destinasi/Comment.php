<?php

namespace App\Http\Livewire\Destinasi;

use App\Models\Destination;
use App\Models\DestinationComment;
use App\Models\DestinationLikeComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $body, $body2, $getdestination, $edit_comment_id, $comment_id;
    public $hasReplies = false;

    public function mount($id)
    {
        $this->getdestination = Destination::find($id);
    }

    public function render()
    {
        return view('livewire.destinasi.comment', [
            'comments' => DestinationComment::with(['user', 'childrens'])
                ->where('destination_id', $this->getdestination->id)
                ->whereNull('destination_comment_id')->get(),
            'total_comment' => DestinationComment::where('destination_id', $this->getdestination->id)->count(),
        ]);
    }

    public function storecomment()
    {
        if (Auth::check()) {
            $this->validate([
                'body' => 'required'
            ]);
            $comment = DestinationComment::create([
                'user_id' => Auth::user()->id,
                'destination_id' => $this->getdestination->id,
                'body' => $this->body,
            ]);
            if ($comment) {
                session()->flash('success', 'komentar berhasil terkirim');
                $this->emit('comment_store', $comment->id);
                $this->body = NULL;
            } else {
                session()->flash('danger', 'komentar gagal terkirim');
                return redirect()->route('getdestination', $this->getdestination->slug);
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
        $comment = DestinationComment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->body2 = $comment->body;
    }
    public function changecomment()
    {
        $this->validate([
            'body2' => 'required'
        ]);
        $comment = DestinationComment::where('id', $this->edit_comment_id)->update([
            'body' => $this->body2,
        ]);
        if ($comment) {
            session()->flash('success', 'komentar berhasil terkirim');
            $this->emit('comment_store', $this->edit_comment_id);
            $this->body = NULL;
            $this->edit_comment_id = NULL;
        } else {
            session()->flash('danger', 'komentar gagal diubah');
            return redirect()->route('getdestination', $this->getdestination->slug);
        }
    }
    public function deletecomment($id)
    {
        $comment = DestinationComment::where('id', $id)->delete();
        if ($comment) {
            return NULL;
        } else {
            session()->flash('danger', 'komentar gagal dihapus');
            return redirect()->route('getdestination', $this->getdestination->slug);
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
        $comment = DestinationComment::find($this->comment_id);
        $comment = DestinationComment::create([
            'user_id' => Auth::user()->id,
            'destination_id' => $this->getdestination->id,
            'body' => $this->body2,
            'destination_comment_id' => $comment->destination_comment_id ? $comment->destination_comment_id : $comment->id,
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
            'destination_comment_id' => $id,
            'user_id' => Auth::user()->id,
        ];
        $like = DestinationLikeComment::where($data);
        if ($like->count() > 0) {
            $like->delete();
        } else {
            DestinationLikeComment::create($data);
        }
        return NULL;
    }
}
