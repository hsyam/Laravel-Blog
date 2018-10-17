<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function tags(){
        return $this->belongsToMany('App\Model\user\tag' , 'post_tags' );
    }

}
