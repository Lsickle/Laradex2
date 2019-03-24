<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class pokemon extends Model
{
    public function trainer(){
    	return $this->belongsTo('LaraDex\trainer');
    }
}
