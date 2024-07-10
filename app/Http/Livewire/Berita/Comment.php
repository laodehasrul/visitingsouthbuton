<?php

namespace App\Http\Livewire\Berita;

use App\Models\Berita;
use App\Models\BeritaComment;
use App\Models\BeritaLikeComment;
use App\Models\LikeCommentBerita;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $body, $body2, $getberita, $edit_comment_id, $comment_id;
    public $hasReplies = false;

    public function mount($id)
    {
        $this->getberita = Berita::find($id);
    }
    public function render()
    {
        return view('livewire.berita.comment', [
            'comments' => BeritaComment::with(['user', 'childrens'])
                ->where('berita_id', $this->getberita->id)
                ->whereNull('berita_comment_id')->get(),
            'total_comment' => BeritaComment::where('berita_id', $this->getberita->id)->count(),
        ]);
    }
    public function showToastr($type, $title)
    {
        return $this->dispatchBrowserEvent('swalpopup', [
            "type" => $type,
            "title" => $title,
            "text" => '',
            "icon" => 'success',
            "timer" => 1500,
            "toast" => true,
            "position" => 'top-right'
        ]);
    }
    public function storecomment()
    {
        if (Auth::check()) {
            $this->validate([
                'body' => 'required'
            ]);
            $comment = BeritaComment::create([
                'user_id' => Auth::user()->id,
                'berita_id' => $this->getberita->id,
                'body' => $this->body,
            ]);
            if ($comment) {
                session()->flash('success', 'komentar berhasil terkirim');
                $this->emit('comment_store', $comment->id);
                $this->body = NULL;
            } else {
                session()->flash('danger', 'komentar gagal terkirim');
                return redirect()->route('getberita', $this->getberita->slug);
            }
        } else {
            $this->dispatchBrowserEvent('error', [
                'html' => 'Anda tidak memiliki akses ke fitur ini! Silahkan Login/Daftar terlebih dahulu.',
                'timer' => 3000,
                'icon' => 'info',
                'toast' => true,
                'position' => 'center',
                'showCloseButton' => true,
                'showCancelButton' => true,
                'focusConfirm' => false
            ]);
            $this->body = NULL;
        }
    }
    public function commentEdit($id)
    {
        $comment = BeritaComment::find($id);
        $this->edit_comment_id = $comment->id;
        $this->body2 = $comment->body;
    }
    public function changecomment()
    {
        $this->validate([
            'body2' => 'required'
        ]);
        $comment = BeritaComment::where('id', $this->edit_comment_id)->update([
            'body' => $this->body2,
        ]);
        if ($comment) {
            session()->flash('success', 'komentar berhasil terkirim');
            $this->emit('comment_store', $this->edit_comment_id);
            $this->body = NULL;
            $this->edit_comment_id = NULL;
        } else {
            session()->flash('danger', 'komentar gagal diubah');
            return redirect()->route('getberita', $this->getberita->slug);
        }
    }
    public function deletecomment($id)
    {
        $comment = BeritaComment::where('id', $id)->delete();
        if ($comment) {
            return NULL;
        } else {
            session()->flash('danger', 'komentar gagal dihapus');
            return redirect()->route('getberita', $this->getberita->slug);
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
        $comment = BeritaComment::find($this->comment_id);
        $comment = BeritaComment::create([
            'user_id' => Auth::user()->id,
            'berita_id' => $this->getberita->id,
            'body' => $this->body2,
            'berita_comment_id' => $comment->berita_comment_id ? $comment->berita_comment_id : $comment->id,
        ]);
        if ($comment) {
            session()->flash('success', 'komentar berhasil terkirim');
            $this->emit('comment_store', $comment->id);
            $this->body2 = NULL;
            $this->comment_id = NULL;
        } else {
            session()->flash('danger', 'komentar gagal terkirim');
            return redirect()->route('getberita', $this->getberita->slug);
        }
    }
    public function like($id)
    {
        $data = [
            'berita_comment_id' => $id,
            'user_id' => Auth::user()->id,
        ];
        $like = BeritaLikeComment::where($data);
        if ($like->count() > 0) {
            $like->delete();
        } else {
            BeritaLikeComment::create($data);
        }
        return NULL;
    }
}
