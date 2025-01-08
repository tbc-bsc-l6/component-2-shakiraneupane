<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;  // Add this line to enable the factory method

    protected $fillable = ['name', 'email', 'message'];
}
