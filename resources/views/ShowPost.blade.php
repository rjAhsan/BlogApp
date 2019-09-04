@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Post Show</h3>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                               <a href="{{ url()->previous() }}"> <button type="submit" class="btn btn-success">
                                    <span> Back</span>
                                   </button></a>
                                @if(Auth::user()->id===$Posts->user_id)
                                <form style="display: inline" action="{{ route('Post.destroy', $Posts->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{route('Post.edit',$Posts)}}"><button class="btn btn-primary"><span>Edit</span></button></a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body">




                        <form method="POST" action="#">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="Title"  class="form-control" readonly  name="Title" value="{{$Posts->Title}}">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Catagorie</label>

                                <div class="col-md-6">

                                    <select class="form-control" name="Catagorie">

                                            <option value=>{!! $Posts->Catagorie->pluck('name')->first() !!}</option>

                                    </select>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Article</label>
                                <div class="col-md-6">
                                   <textarea class="form-control" rows="10" cols="100" readonly name="Body" >
                                    {{$Posts->Body}}
                                   </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Upload Image</label>
                                <div class="col-md-6">
                                    <img class="img-responsive" style="height:250px;width:350px" alt={{$Posts->Title}}  src="{{url('/images/'.$Posts->Media->pluck('path')->first() )}}"/>

                                </div>
                            </div>



                        </form>
                    </div>





                </div>
            </div>
        </div>
    </div>
@endsection
