<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $table = 'detail_transactions';

    protected $guarded = ['id'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

}
