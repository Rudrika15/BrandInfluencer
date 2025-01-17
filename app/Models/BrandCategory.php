<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandCategory extends Model
{
    use HasFactory;


    public function brand()
    {
        return $this->hasMany(BrandWithCategory::class, 'brandCategoryId', 'id');
    }
}
