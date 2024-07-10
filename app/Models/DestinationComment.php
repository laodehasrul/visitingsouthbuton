<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class DestinationComment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function isParent(): bool
    {
        return is_null($this->destination_comment_id);
    }
    public function childrens()
    {
        return $this->hasMany(DestinationComment::class);
    }
    public function destinations()
    {
        return $this->hasOne(Destination::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hasLike()
    {
        return $this->hasOne(DestinationLikeComment::class)->where('destination_like_comments.user_id', Auth::user()->id);
    }
    public function totalLikes()
    {
        return $this->hasMany(DestinationLikeComment::class)->count();
    }
}
