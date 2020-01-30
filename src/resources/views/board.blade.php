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
            <h3 class="card-header text-center">一言掲示板</h3>
                <div class="card-body">
                    <form method='post' action="/">
                        <div class="form-group" >
                            <label class="control-label">name</label>
                            @if(!empty($errors->first('name')))
                                <span class='error'>{{$errors->first('name')}}</span>
                            @endif
                            <input class="form-control" type="text" name='name' value=''>
                        </div>
                        <div class="form-group">
                            <label class="control-label">message</label>
                            @if(!empty($errors->first('message')))
                                <span class='error'>{{$errors->first('message')}}</span>
                            @endif
                            <textarea class="form-control" rows='3' name='message' value=''></textarea>
                        </div>
                        <div>
                            <input type='submit' value='投稿'>
                        </div>
                        @csrf
                    </form>
                </div>
        </div>  
    </div>
    <div class="container" id='box'>
        <div class="card border-primary">
            <h3 class="card-header text-center">投稿ログ</h3>
                @foreach ($text as $row)
                    <div id='header' class="card-header">
                        <div>{{ $row->name }}</div>
                        <div id='day'>{{ $row->updated_at }}</div>
                    </div>
                    <div class="card-body">{{ $row->message }}</div>
                @endforeach
        </div> 
    {{ $text->links()}} 
    </div> 
</body>
</html>