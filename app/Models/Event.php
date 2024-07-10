<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'image_featured',
        'date_time',
        'viewer',
        'user_id',
    ];
    public function setDateTimeAttribute($value)
    {
        $this->attributes['date_time'] = Carbon::createFromFormat('m/d/Y', $value)->format('Y-m-d');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function totalComments()
    {
        return $this->hasMany(EventComment::class);
    }
    public function comments()
    {
        return $this->hasMany(EventComment::class);
    }
    // vote
    public function votes() {
        return $this->hasMany(Eventvote::class);
    }
    public function userVotes() {
        return $this->votes()->one()->where('user_id', auth()->id());
    }

    public function hasVote()
    {
        return $this->hasOne(Eventvote::class)->where('eventvotes.user_id', Auth::user()->id);
    }
    public function totalVotes()
    {
        return $this->hasMany(Eventvote::class)->count();
    }

    public function eventvote()
    {
        return $this->BelongsToMany(User::class, 'eventvotes')->withTimestamps();
    }
}
