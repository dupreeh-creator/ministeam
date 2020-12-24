<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{

    public function games(){
        return $this->hasMany('App\Models\Game');
    }
}
