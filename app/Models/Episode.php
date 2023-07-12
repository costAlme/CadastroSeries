<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = ['number'];
    
    use HasFactory;
    public $timestamps = false;

    public function Season()
    {
        return $this->belongsTo(Season::class);
    }
}