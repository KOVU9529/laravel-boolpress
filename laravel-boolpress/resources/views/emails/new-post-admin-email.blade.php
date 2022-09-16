<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>CIao sono la tua email</h1>
    <h2>Ti avviso per la creazione di un nuovo post</h2>
    <h3>Titolo nuovo post: {{$new_post->title}}</h3>
    <p>
        <h4>Descizione nuovo post:</h4>
        {{$new_post->content}}
    </p>
    <a href="{{route('admin.posts.show', ['post'=>$new_post->id])}}">Visualizza il nuovo post creato</a>
</body>
</html>