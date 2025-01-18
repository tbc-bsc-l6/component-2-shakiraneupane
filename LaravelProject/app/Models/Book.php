<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Add description to the fillable array
    protected $fillable = [
        'title',
        'author',
        'price',
        'genre',
        'description',
        'image_url',
        'sales_count'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
