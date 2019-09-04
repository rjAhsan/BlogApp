<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagorie extends Model
{
    protected $fillable = ['name'];



  public  function Post(){
        return $this->belongsToMany(Post::class,'catagorie_post');

  }




}
