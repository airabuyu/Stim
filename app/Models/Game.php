<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['game_name', 'description', 'long_description', 'category', 'developer', 'publisher', 'price', 'made_at', 'cover', 'trailer', 'adult'];
}
