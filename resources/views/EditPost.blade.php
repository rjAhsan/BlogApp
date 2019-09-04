@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Edit Post</h3> <a href="{{ url()->previous() }}"> <button type="submit" class="btn btn-success">
                                <span> Back</span>
                            </button></a></div>

                    <div class="card-body">
                        <div>
                            @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger"> {{$error}}</p>
                                @endforeach
                            @endif
                        </div>

                        <form method="POST" action="{{route('Post.update',$Posts)}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="name"   type="text" class="form-control @error('name') is-invalid @enderror" name="Title"  required value="{{$Posts->Title}}"  >

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Catagorie</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="Catagorie">
                                            @foreach($catagories as $catagorie)
                                            <option value={{$catagorie->id}}>{{$catagorie->name}}</option>
                                            @endforeach
                                    </select>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Article</label>
                                <div class="col-md-6">
                                   <textarea class="form-control" rows="10" cols="100" name="Body"  requried>
                                     {{$Posts->Body}}
                                   </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Upload Image</label>
                                <div class="col-md-6">
                                    <input type="file"  src="img_submit.gif" alt="Media" name="Path">

                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Post
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
