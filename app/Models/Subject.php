<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function stocks()
    {
        return $this->hasMany(stock::class);
    }

    public function classification()
    {
        return $this->belongsTo(classification::class);
    }

}
