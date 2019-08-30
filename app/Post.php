<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['Title','Body'];

    public  function User(){
            return $this->belongsTo('App\User');
    }
    public function Catagorie(){
        return $this->belongsToMany('App\Catagorie');
    }

    public function Media(){
        return $this->belongsToMany('App\Media');
    }
}
