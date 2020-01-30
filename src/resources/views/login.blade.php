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
        <div class="card border-primary">
            <h3 class="card-header text-center">ログインフォーム</h3>
                <div class="card-body">
                    <form method='post' action="/login">
                        <div class="form-group">
                            <label class="control-label">パスワード</label>
                            @isset($error)
                                <span class='error'>{{$error}}</span>
                            @endisset
                            <input class="form-control" type='text' name='password' value=''></input>
                        </div>
                        <div>
                            <input type='submit' value='login'></input>
                        </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
        </div>  
    </div>
</body>
</html>