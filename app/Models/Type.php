<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type';

    public function animals(){
        return $this->hasMany('App\Models\Animal');
    }
}
