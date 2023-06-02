<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Lessor extends Model implements Authenticatable
{
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
}
