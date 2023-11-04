<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function transactions()
    {
        return $this->hasMany(History::class, 'type_id');
    }
}
