<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EventComment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function isParent(): bool
    {
        return is_null($this->event_comment_id);
    }
    public function childrens()
    {
        return $this->hasMany(EventComment::class);
    }
    public function events()
    {
        return $this->hasOne(Event::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hasLike()
    {
        return $this->hasOne(EventLikeComment::class)->where('event_like_comments.user_id', Auth::user()->id);
    }
    public function totalLikes()
    {
        return $this->hasMany(EventLikeComment::class)->count();
    }
}
