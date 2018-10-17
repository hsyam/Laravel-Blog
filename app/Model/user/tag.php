<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function post(){
        return $this->belongsToMany('App\Model\user\post' , 'post_tags' );
    }
}
