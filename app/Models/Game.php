<?php

namespace App\Models;

use App\Models\Scope\LastWeekScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model
{

    // protected static function booted(){
    //     static::addGlobalScope(new LastWeekScope());
    // }
    protected $fillable=[
        'title','score','description','publisher','genre_id'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function scopeBest(Builder $builder): Builder
    {
        return $builder->where('score', '>', 90);
    }

    public function scopePublisher(Builder $builder, string  $name): Builder
    {
        return $builder->where('publisher', $name);
    }

    // protected $attributes = [
    //     'score' => 5
    // ];
}
