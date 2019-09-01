<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catagorie;
class ViewsController extends Controller
{
 public function CreatePost(){
     $Catagories=Catagorie::all();
     return view('createPost',compact('Catagories'));

 }
 public function EditPost(){
     return view('EditPost');
 }

 public function ShowPost(){
     return view('ShowPost');
 }



}
