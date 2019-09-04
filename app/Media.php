<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['path'];


    public function Post(){
        return $this->belongsToMany(Post::class,'media_post');
    }

    public function getPathAttribute($val){
        return $val;

    }

}
