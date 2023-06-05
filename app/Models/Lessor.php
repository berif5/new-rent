<?php

namespace App\Models;

use App\Notifications\NewBookingNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

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

//     public function user(): BelongsTo
// {
//     return $this->belongsTo(User::class);
// }

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
// public function notifiableType()
// {
//     return 'App\Models\Lessor';
// }

public function notifications()
{
    return $this->morphMany(DatabaseNotification::class, 'notifiable')
                ->orderBy('created_at', 'desc');
}



public function bookings()
    {
        return $this->hasManyThrough(Booking::class, Product::class);
    }

    // public function notifyBooking()
    // {
    //     $bookings = $this->bookings()
    //         ->where('booking_status', 'pending')
    //         // ->whereNotNull(Product->lessor_id)
    //         ->get();

    //     if ($bookings->count() > 0) {
    //         // Notification::send($this, new NewBookingNotification($bookings));

    //         foreach ($bookings as $booking) {
    //             // $this->notify(new NewBookingNotification($booking));
    //             $this->unreadNotifications()->create([
    //                 'type' => NewBookingNotification::class,
    //                 'data' => ['message' => 'New booking received:'],
    //             ]);
    //         }
    //     }
    // }

    public function notifyBooking()
    {
        $bookings = $this->bookings()
            ->where('booking_status', 'pending')
            ->whereHas('product', function ($query) {
                $query->where('lessor_id', $this->id);
            })
            ->get();

        if ($bookings->count() > 0) {
            foreach ($bookings as $booking) {
                $this->unreadNotifications()->create([
                    'type' => NewBookingNotification::class,
                    'data' => [
                        'booking_id' => $booking->id,
                        'message' => 'New booking received: ' . $booking->id,
                    ],
                ]);
            }
        }
    }


}
