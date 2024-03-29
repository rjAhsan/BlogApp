<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['Title','Body'];

    public  function User(){
            return $this->belongsTo(User::class);
    }
    public function Catagorie(){
        return $this->belongsToMany(Catagorie::class,'catagorie_post');
    }

    public function Media(){
        return $this->belongsToMany(Media::class,'media_post');
    }
}
