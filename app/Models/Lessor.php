<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessor extends Model
{
    use HasFactory;
    protected $table = 'lessors';


    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'city',
        'image',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // protected $timestamps = false;
    public $timestamps = false;


    public function role()
    {
        return $this->belongsTo(Role::class);

    }
}
