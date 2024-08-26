<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animal';

    public function status(){
        return $this->belongsTo('App\Models\Status');
    }

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }
}
