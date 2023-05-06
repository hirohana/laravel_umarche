<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryCategory extends Model
{
    use HasFactory;

    public function primary()
    {
        return $this->belongsTo(PrimaryCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
