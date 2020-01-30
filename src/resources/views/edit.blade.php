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
        <h3 class="card-header text-center">編集ページ</h3>
            <div class="card-body">
                @if ($flag == 1)
                    <form method='post' action="/admin/edit/{{ $colum->id }}/1/1">
                        <div class="form-group">
                            <label class="control-label">名前</label>
                            @if(!empty($errors->first('name')))
                                <span class='error'>{{$errors->first('name')}}</span>
                            @endif
                            <input class="form-control" type="text" name='name' value="{{ $colum->name }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">テキスト</label>
                            @if(!empty($errors->first('message')))
                                <span class='error'>{{$errors->first('message')}}</span>
                            @endif
                            <textarea class="form-control" rows='3' name='message'>{{ $colum->message }}</textarea>
                        </div>
                        <div>
                            <button type='click'>更新</button>
                        </div>
                        @csrf
                    </form>
                @elseif($flag == 2)
                    <div class="form-group">
                        <label class="control-label">名前</label>
                        <input class="form-control" type="text" name='name' value="{{ $colum->name }}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">テキスト</label>
                        <textarea class="form-control" rows='3' name='message'>{{ $colum->message }}</textarea>
                    </div>
                        <form method='post' action="/admin/edit/{{ $colum->id }}/2/2">
                            <div>
                                <button type='click'>削除</button>
                            </div>
                            @csrf
                        </form>
                        @endif 
            </div>
    </div>  
</div>
</body>
</html>