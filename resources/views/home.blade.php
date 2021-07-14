<!DOCTYPE html>
<title>My Blog</title>
<header>
    <link rel="stylesheet" href="/default.css">
</header>
<body>
    <?php foreach ($postList as $key => $post):?>
        <div class="blog-post">
            <h1><a href="/view-post/<?= $post->id ?>"><?= $post->title ?></a></h1>
            <p>
                By <a href="/author/{{$post->author->user_name}}">{{ $post->author->name}}</a> in <a href="category/{{$post->category->category_code}}">{{$post->category->category_name}}</a>
            </p>
            <?= $post->excerpt ?>
        </div>
    <?php endforeach; ?>
</body>