@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Create Post</h3></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('Post.create') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="name" placeholder="Write Title " type="text" class="form-control @error('name') is-invalid @enderror" name="Title"  required  >

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Catagorie</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="Catagorie">
                                    @foreach($Catagories as $Catagorie)
                                        <option value="$Catagorie->id">{{$Catagorie->id}} || {{$Catagorie->name}}</option>
                                     @endforeach
                                    </select>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Article</label>
                                <div class="col-md-6">
                                   <textarea class="form-control" rows="10" cols="100" name="Body" requried>
                                       Write
                                       Your
                                       Article
                                       here........
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
                                       Create Post
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
