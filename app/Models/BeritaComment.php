<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BeritaComment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function isParent(): bool
    {
        return is_null($this->berita_comment_id);
    }
    public function childrens()
    {
        return $this->hasMany(BeritaComment::class);
    }
    public function beritas()
    {
        return $this->hasOne(Berita::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hasLike()
    {
        return $this->hasOne(BeritaLikeComment::class)->where('berita_like_comments.user_id', Auth::user()->id);
    }
    public function totalLikes()
    {
        return $this->hasMany(BeritaLikeComment::class)->count();
    }
}
