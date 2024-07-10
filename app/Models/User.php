<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'no_telp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function event()
    {
        return $this->hasMany(Event::class);
    }
    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
    public function destinasi()
    {
        return $this->hasMany(Destination::class);
    }

    public function comments()
    {
        return $this->hasMany(BeritaComment::class);
    }

    // Feed
    public function story()
    {
        return $this->hasMany(Story::class);
    }

    // Berita Vote
    public function beritavote()
    {
        return $this->BelongsToMany(Berita::class, 'berita_votes')->withTimestamps();
    }
    public function hasBeritaVoted(Berita $berita)
    {
        return $this->beritavote()->where('berita_id', $berita->id)->exists();
    }

    // Event Vote
    public function eventvote()
    {
        return $this->BelongsToMany(Event::class, 'eventvotes')->withTimestamps();
    }
    public function hasEventVoted(Event $event)
    {
        return $this->eventvote()->where('event_id', $event->id)->exists();
    }

    // Destination Vote
    public function destinationvote()
    {
        return $this->BelongsToMany(Destination::class, 'destination_votes')->withTimestamps();
    }
    public function hasDestinationVoted(Destination $destination)
    {
        return $this->destinationvote()->where('destination_id', $destination->id)->exists();
    }

    public function avatarUrl()
    {
        return $this->profile_photo_path
            ? Storage::url('profile/avatar/'. auth()->user()->profile_photo_path)
            : auth()->user()->profile_photo_url;
    }
    public function avatarInitial($id)
    {
        $user = User::find($id);
        return $this->profile_photo_path
            ? Storage::url('profile/avatar/'. $user->profile_photo_path)
            : $user->profile_photo_url;
    }


}
