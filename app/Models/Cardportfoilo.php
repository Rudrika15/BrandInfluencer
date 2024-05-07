<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardportfoilo extends Model
{
    use HasFactory;
    protected $fillable = ['card_id', 'image'];


    public function card()
    {
        return $this->belongsTo(CardsModels::class, 'card_id', 'id');
    }
}
