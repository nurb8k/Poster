@extends('layouts.app')

@section('title','Post page' )
@section('content')
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded mr-2" alt="...">
            <strong class="mr-auto">Bootstrap</strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            See? Just like this.
        </div>
    </div>

        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded mr-2" alt="...">
            <strong class="mr-auto">Bootstrap</strong>
            <small class="text-muted">2 seconds ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Heads up, toasts will stack automatically
        </div>
    </div>
    <div class="container my-2 mb-4">
{{--  <h1>Osy jerasdasdasd</h1>--}}
        <h2>{{$post->title}}</h2>
        <hr>
        <h4>{{$post->content}}</h4>
        <a class="btn btn-outline-success" href="{{route('posts.edit',$post->id)}}"
        >Edit post</a>
    </div>
    <hr>
    <div class="container mt-3 p-1  ">
        <form action="{{route('comments.create')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Create new comment</label><br>
                <textarea  id="exampleFormControlTextarea1" name="content" placeholder="Enter your comments!" cols="25" rows="4">
            </textarea>
            </div>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <button class="btn btn-success" type="submit">Publish</button>
        </form>

    </div>

    <p>Comments:</p>
    <div>


        @if ($post->comments != null)
            @foreach($post->comments as $com)
                <hr>
                <h5>{{$com->content}}</h5>
                <p>author:{{$com->user->name}}</p>
                <a class="btn btn-success" href="{{route('comments.edit',$com)}}">????????????????</a>

                <form action="{{route('comments.delete',$com)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">??????????????</button>
                </form>
                <p>___________</p>

            @endforeach
        @else
            <p>no comments yet!</p>
        @endif

    </div>
@endsection

