@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header"><h2>Welcome {{$user = Auth::user()->name}}</h2></div>
                <a href="#"><button class="btn btn-success"><span>CreatePost</span></button></a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

            </div>
            <div>
                @foreach($Posts as $Post)
                    <a href="#"><h3>{{$Post->Title}}</h3></a>
                    <h6>@<span>{{$Post->user->name}}</span></h6>
                    <p>{{$Post->Body}}</p>
                    <h5>{{$Post->created_at->diffForHumans()}}</h5>
                    <a href="#"><button class="btn btn-primary"><span>Edit</span></button></a>
                    <a href="#"><button class="btn btn-danger"><span>Delete</span></button></a>
                    <hr>
                    <br>
                @endforeach

            </div>
            {{ $Posts->links() }}
        </div>

    </div>
</div>
@endsection
