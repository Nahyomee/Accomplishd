<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fcm_token',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /** Relationship with categories */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /** Relationship with tags */
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    /** Relationship with tasks */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    protected function thumbnail(): Attribute
    {
        return Attribute::get(function(){
            return ($this->image == null) ? asset('backend/assets/avatars/face-1.jpg') :
                    asset('storage/users/'.$this->image);
        });
    }
}
