<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pro_name',
        'cat_id',
        'price',
        'quantity',
        'discount',
        'description',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
