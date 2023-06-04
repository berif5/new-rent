<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'id',
        'name',
        'email',
        'password',
        'role_id',

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

    protected $table='users';
    public $timestamps='false';
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
/**
 * Get the URL of the user's profile image.
 *
 * @return string|null
 */
public function getProfileImage()
{
    if ($this->image) {
        // Adjust the path based on your image location and naming convention
        return asset('images/profiles/' . $this->image);
    }

    return null;
}

function bookings(){
    return $this->hasMany(Booking::class);
}

public function lessor(): HasOne
{
    return $this->hasOne(Lessor::class, 'role_id', 'role_id');
}

}
