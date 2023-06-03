<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'status',
        'product_type',
        'category_id',
        'image1',
        'image2',
        'image3',
        'lessor_id', // Updated the foreign key column name to match the relationship
    ];

    protected $primaryKey = 'id';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessor()
    {
        return $this->belongsTo(Lessor::class);
    }
    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }
}

