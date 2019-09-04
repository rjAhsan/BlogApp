<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostForm;
use App\PostMedia;
use Illuminate\Http\Request;
use App\Post;
use App\Media;
use App\PostCatagorie;
use App\Catagorie;
use Auth;
use Gate;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//            $Posts=Post::all();
//            //dd($Post);
//            return view('home',['Posts'=>$Posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Catagories=Catagorie::all();
        return view('createPost',compact('Catagories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostForm $request)
    {
        if ($request->hasFile('Path') && $request->Path->isValid()) {
            $filextension = $request->Path->extension();
            $filename = time() . "." . $filextension;
            $request->Path->move(public_path('images'), $filename);

        } else {
            $filename = 'image-not-found.jpg';
        }

        $Title = $request->Title;
        $Body = $request->Body;
        $Catagorie = $request->Catagorie;
        $path = $filename;
        $user_id = Auth::user()->id;

//        $post=Post::create([
//            'Title'->$Title,
//            'Body'->$Body,
//            'user_id'->$user_id
//        ]);

        $post = new Post;
        $post->Title = $Title;
        $post->Body = $Body;
        $post->user_id = $user_id;
        $post->save();

        $media = new Media;
        $media->path = $path;
        $media->save();

        $post->Media()->sync($media->id);
        $post->Catagorie()->sync($Catagorie);

//        dd($media->id);


//
//        $postmedia=new PostMedia;
//        $postmedia->post_id=$post->id;
//        $postmedia->media_id=$media->id;
//        $postmedia->save();
//
//        $postCatagorie= new PostCatagorie;
//        $postCatagorie->post_id=$post->id;
//        $postCatagorie->catagorie_id=$Catagorie;
//        $postCatagorie->save();


        return redirect('home')->with('status', 'Post Added Seccuflly');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Posts = Post::find($id);
//        dd($Posts);
        return view('ShowPost', compact('Posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $Posts = Post::find($id);
         if(Auth::user()->id === $Posts->user_id)
         {


        $catagories = Catagorie::all();
        return view('EditPost', compact('Posts', 'catagories'));
       }
        else   {
            return redirect('home')->with('status', 'You are Not Allowed');

        }



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostForm $request, $id)
    {

        $Posts = Post::findOrFail($id);


        //dd($Posts);


            if ($request->hasFile('Path') && $request->Path->isValid()) {
                $filextension = $request->Path->extension();
                $filename = time() . "." . $filextension;
                $request->Path->move(public_path('images'), $filename);

            } else {
                $filename = 'image-not-found.jpg';

            }

            $Title = $request->Title;
            $Body = $request->Body;
            $Catagorie = $request->Catagorie;
            $path = $filename;


//        $post=Post::create([
//            'Title'->$Title,
//            'Body'->$Body,
//            'user_id'->$user_id
//        ]);


            $Posts->Title = $Title;
            $Posts->Body = $Body;
            $Posts->save();
            //dd($Media_id=$Posts->Media->pluck('id'));
            $Media_id=$Posts->Media->pluck('id');
            $Media_Update=Media::find($Media_id)->first();
            $Media_Update->path = $path;
            $Media_Update->save();

            $Posts->Media()->sync($Media_Update->id);
            $Posts->Catagorie()->sync($Catagorie);

//        dd($media->id);


//
//        $postmedia=new PostMedia;
//        $postmedia->post_id=$post->id;
//        $postmedia->media_id=$media->id;
//        $postmedia->save();
//
//        $postCatagorie= new PostCatagorie;
//        $postCatagorie->post_id=$post->id;
//        $postCatagorie->catagorie_id=$Catagorie;
//        $postCatagorie->save();


        return redirect('home')->with('status', 'Post Update ');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id ,Post $post)
    {
        $delposts = Post::findOrFail($id);
        //Appply ACL WITH IF_ELSE
//        if(Auth::user()->id === Post::find($id)->user_id)
            ///Applay ACL With GATES That Define in Authserviceprovider
        //    if(Gate::allows('edit-post',$delposts))

        if(Auth::user()->can('delete',$delposts))
        {
            $delposts = Post::findOrFail($id);
            $delposts->delete();
            $Posts = Post::paginate(10);
//            return view('home', compact('Posts'))->with('Status', 'Post Delete Succefuly');
            return redirect('home');
        }
        else{
            return redirect('home')->with('status', 'You are Not Allowed');


        }

    }
}
