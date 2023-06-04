<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';

    protected $fillable = [
        'start_date',
        'end_date',
        'total_price',
        'name_on_card',
        'card_number',
        'cvc',
        'expiration_month',
        'expiration_year'
    ];


    function user(){
        return $this->belongsTo(user::class);
    }

    function product(){
        return $this->belongsTo(product::class);
    }

    
}
