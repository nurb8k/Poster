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
<a style="background-color: #0dcaf0;color: white ;font-size: 32px" href="{{ route('posts.create') }}">Create post</a>
<div>
    <a href="{{route('posts.index')}}">All posts</a>
    @foreach($categories as $category)
        <a href="{{route('posts.category',$category->id)}}"  >| {{$category->name}} | </a>
    @endforeach
    @foreach($posts as $post )
        <p>----------------------------------</p>
        <a href="{{route('posts.show',$post->id)}}"><h3> {{$post->title}}</h3></a>
        <p> {{$post->content}}</p>
        <form action="{{route('posts.destroy',$post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">delete</button>
        </form>
        <p>----------------------------------</p>
    @endforeach
</div>
</body>
</html>
