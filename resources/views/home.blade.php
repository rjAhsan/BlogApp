@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-header"><h2>Welcome {{$user = Auth::user()->name}}</h2></div>
                <a href="{{route('Post.create')}}"><button class="btn btn-success"><span>CreatePost</span></button></a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

            </div>
            <div>
                @if(count($Posts)>0)
                @foreach($Posts as $Post)
                    <a href="{{route('Post.show',$Post)}}"><h2><em>{{$Post->Title}}</em></h2></a>
                    <h6>@<span><strong>{{$Post->user->name}}</strong></span></h6>
                    <img class="img-responsive" style="height:250px;width:350px" alt={{$Post->Title}}  src="{{url('/images/'.$Post->Media->pluck('path')->first() )}}"/>
                    <p>{{$Post->Body}}</p>
                    <a href="{{route('Post.show',$Post)}}"><button class="btn btn-success"><span>ReadMore</span></button></a>
                    <h5>{{$Post->created_at->diffForHumans()}}</h5>
                   @if(Auth::user()->id===$Post->user->id)
                    <a href="{{route('Post.edit',$Post)}}"><button class="btn btn-primary"><span>Edit</span></button></a>

                    {{--<a href="{{url('Posts/'.$Post->id)}}"><button class="btn btn-danger"><span>Delete</span></button></a>--}}
                    {{----}}


                    {{--When Use Resourceful Controller --}}
                    {{--And Want to Delete Data Then --}}
                    {{--Below Method Will Work --}}

                     <form style="display: inline" action="{{ route('Post.destroy', $Post) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                     </form>
                    @endif
                    <hr>
                    <br>
                @endforeach
                @else
                    <h3>Post Not Found  </h3>
                    @endif
            </div>
        @if(count($Posts)>0)
            {{ $Posts->links() }}
        @else
                <p>No Recoads Found </p>
            @endif
        </div>

    </div>
</div>
@endsection
