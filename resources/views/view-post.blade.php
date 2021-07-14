<!DOCTYPE html>
<title>My Blog</title>
<header>
    <link rel="stylesheet" href="/default.css">
</header>
<body>
    <div class="blog-post">
        <h1><?= $post->title ?></h1>
        <p>
            By <a href="/author/{{$post->author->user_name}}">{{ $post->author->name}}</a> in <a href="category/{{$post->category->category_code}}">{{$post->category->category_name}}</a>
        </p>
        <p>
             {{$post->body}}
        </p>
        <a href="/home">Back to Homepage</a>
    </div>
</body>