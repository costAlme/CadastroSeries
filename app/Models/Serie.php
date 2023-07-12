<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;


class Serie extends Model
{
    protected $table = 'series';
    protected $with = ['seasons'];
    use HasFactory;
    protected $fillable = ['nome'];

    public function seasons(){

        return $this->hasMany(Season::class, 'series_id', 'id');
    }

    protected static function booted()
    {

        
      self::addGlobalScope('ordered', function(Builder $queryBuilder){ 
        $queryBuilder->orderBy('nome');
      });
    }

}
