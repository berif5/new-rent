<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;

class Lessor extends Model implements Authenticatable
{
    use Notifiable;
    use HasFactory;
    use AuthenticatableTrait;
    protected $table = 'lessors';

    public $timestamps = 'false';
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'city',
        'role_id',

        'image',
    ];






    public function products()
    {
        return $this->hasMany(Product::class);
    }



    // protected $timestamps = false;



    public function role()
    {
        return $this->belongsTo(Role::class);

    }

    public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

public function unreadNotifications()
{
    return $this->morphMany(DatabaseNotification::class, 'notifiable')
        ->whereNull('read_at');
}

public function routeNotificationFor($notification)
{
    // Return the email address of the lessor
    // return $this->email;
}
public function notifiableType()
{
    return 'App\Models\Lessor';
}


}
