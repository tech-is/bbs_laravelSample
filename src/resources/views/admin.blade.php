<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/board.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container" id='box'>
        <form method='post' action='/logout'>
        <button class='logout' type='click'>ログアウト</button>
        @csrf
        </form>
    <div class="card border-primary">
        <h3 class="card-header text-center">ひとこと掲示板管理ページ</h3>
            <span id='buttun'><a href="/admin/csv"><button type='click' >CSVダウンロード</button></a></span>
                @foreach ($text as $row)
            <div id='header' class="card-header">
                <div>{{ $row->name }}</div>
                <div id='day'>{{ $row->updated_at }}</div>
            </div>
            <div class="card-body">
                {{ $row->message }}
            </div>
            <div id='hooter' class='card-hooter'>
                <div id='buttun'>
                    <a href="/admin/edit/{{ $row->id }}/1"><button type='click' >編集</button></a>
                    <a href="/admin/edit/{{ $row->id }}/2"><button type='click'>削除</button></a>
                </div>
            </div>
            @endforeach
    </div>
    {{ $text->links()}}  
</div> 
</body>
</html>