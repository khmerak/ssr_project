<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'categories';
    protected $primaryKey= 'id';
    protected $fillable=[
        'category_name',
        'status',
        'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}
