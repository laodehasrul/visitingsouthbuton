<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'image_featured',
        'viewer',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function totalComments()
    {
        return $this->hasMany(BeritaComment::class);
    }
    public function comments()
    {
        return $this->hasMany(BeritaComment::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(BeritaVote::class);
    }

    public function userVotes(): HasOne
    {
        return $this->votes()->one()->where('user_id', auth()->id());
    }

    public function hasVote()
    {
        return $this->hasOne(BeritaVote::class)->where('berita_votes.user_id', Auth::user()->id);
    }
    public function totalVotes()
    {
        return $this->hasMany(BeritaVote::class)->count();
    }

    public function beritavote()
    {
        return $this->BelongsToMany(User::class, 'berita_votes')->withTimestamps();
    }
    
}
