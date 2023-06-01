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

    public $timestamps = false;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'city',
        'image',
    ];
<<<<<<< HEAD
    
    
=======

>>>>>>> 4be033e79bd1f0fcdba4f9d2550d00dfb2f34b86
    public function products()
    {
        return $this->hasMany(Product::class);
    }
<<<<<<< HEAD
   
=======
    // protected $timestamps = false;
    public $timestamps = false;

>>>>>>> 4be033e79bd1f0fcdba4f9d2550d00dfb2f34b86

    public function role()
    {
        return $this->belongsTo(Role::class);

    }
}
