<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show page</title>
</head>
<style>
    .btn {
        text-decoration: none;
        font-size: 18px;
        border: 2px solid;
        color: white
    }

    .success {
        background-color: #03C04A;
    }

    .danger {
        background-color: red;
    }
</style>
<body style="background-color: #F5F5F5;margin-left: 25px">

<a href="{{ route('posts.index') }}">index page</a>
<p>____________________________________________________</p>
<h2>{{$post->title}}</h2>
<p>_______________________</p>
<h4>{{$post->content}}</h4>
<a class="btn success" href="{{route('posts.edit',$post->id)}}"
>Edit post</a>
<br><br><br>
<p>____________________________________________________</p>
<div>
    <form action="{{route('comments.create')}}" method="post">
        @csrf
        <textarea name="content" placeholder="Enter your comments!" cols="25" rows="8">
            </textarea>
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <br>
        <button type="submit">Publish</button>
    </form>
</div>
<p>Comments:</p>
<div>

    <p>@if ($comments != null)
        @foreach($comments as $com)

            <p>___________</p>
            <p >  @if($com->created_at == null) no date @else  {{$com->created_at}} @endif </p>
            <h3>{{$com->content}}</h3>

            <a class="btn success" href="{{route('comments.edit',$com)}}">EDIT</a>
            <form action="{{route('comments.delete',$com)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn danger" type="submit">Delete</button>
            </form>
            <p>___________</p>

        @endforeach
    @else <p>no comments yet!</p>

        @endif
        </p>
</div>


</body>
</html>
