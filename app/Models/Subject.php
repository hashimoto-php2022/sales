<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['isbn_code', 'title', 'class_id', 'author'];

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function classification(){
        return $this->belongsTo(classification::class, 'class_id');
    }
}
