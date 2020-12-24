<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'series',
        'description',
        'image',
        'price',
        'category',
        'rates',
    ];
    public function year(){
        return $this->belongsTo('App\Models\Year');
    }

}
