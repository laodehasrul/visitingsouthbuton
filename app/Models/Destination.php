<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;

class Destination extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function galeries()
    {
        return $this->belongsTo(DestinationGalery::class);
    }

    public function scopeSearchResults($query)
    {
        return $query
            ->when(request()->filled('search'), function ($query) {
                $query->where(function ($query) {
                    $search = request()->input('search');
                    $query->where('name', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")
                        ->orWhere('address', 'LIKE', "%$search%");
                });
            })
            ->when(request()->filled('category'), function ($query) {
                $query->whereHas('category', function ($query) {
                    $query->where('id', request()->input('category'));
                });
            });
    }

    public function totalComments()
    {
        return $this->hasMany(DestinationComment::class);
    }
    public function comments()
    {
        return $this->hasMany(DestinationComment::class);
    }

    // Vote
    public function votes()
    {
        return $this->hasMany(DestinationVote::class);
    }
    public function userVotes()
    {
        return $this->votes()->one()->where('user_id', auth()->id());
    }

    public function hasVote()
    {
        return $this->hasOne(DestinationVote::class)->where('destination_votes.user_id', Auth::user()->id);
    }
    public function totalVotes()
    {
        return $this->hasMany(DestinationVote::class)->count();
    }

    public function destinationvote()
    {
        return $this->BelongsToMany(User::class, 'destination_votes')->withTimestamps();
    }
}
