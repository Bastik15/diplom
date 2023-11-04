<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function information()
    {
        return $this->hasOne(ProductInformation::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}
