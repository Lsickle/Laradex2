<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function users(){
        return $this->belongsToMany('LaraDex\User');
    }
}
