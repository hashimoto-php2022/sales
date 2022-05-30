<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subject_id', 'status', 'price', 'stock', 'remarks'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function subject() 
    {
        return $this->belongsTo(subject::class);
    }

    public function history() 
    {
        return $this->belongsTo(History::class);
    }
}
