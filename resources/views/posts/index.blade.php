<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index page</title>
</head>
<style>
    * {
        text-decoration: none;
        font-family: Arial, sans-serif;
    }
</style>
<body style="background-color: lightgoldenrodyellow; ">
<a style="border: 3px solid red ;font-size: 32px" href="{{ route('posts.create') }}">Create page</a>
<div>

    @foreach($posts as $post )
        <p>----------------------------------</p>
        <a href="{{route('posts.show',$post->id)}}"><h3> {{$post->title}}</h3></a>
        <p> {{$post->content}}</p>
        <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
        <p>----------------------------------</p>
    @endforeach
</div>
</body>
</html>
