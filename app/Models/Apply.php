<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $table = 'applies'; // optional: only if your table is not plural 'applies'

    protected $fillable = [
        'campaignId',
        'userId',
        'status',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaignId', 'id');
    }


    public function campaignData()
    {
        return $this->hasOne(Campaign::class, 'id', 'campaignId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
