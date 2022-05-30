@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <p>{{Auth::user()->name}}</p>
        <h1>Blog Name</h1>
        <p class='create'><a href='/posts/create'>create</a></p>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href='/posts/{{$post->id}}'><h2 class='title'>{{$post->title}}</h2></a>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class='body'>{{$post->body}}</p>
                    <form id="form" action='/posts/{{$post->id}}' method='POST'>
                        @csrf
                        @method('DELETE')
                        <input type='button' value='delete' onclick="buttonClick()">
                    </form>
                </div>
            @endforeach
        </div>
        <div>
            {{$posts->links()}}
        </div>
        
    <script>
        function buttonClick(){
            if(confirm("削除しますか？")){
                document.getElementById("form").submit();
            }
        }
	</script>
    </body>
</html>
@endsection