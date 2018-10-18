<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{--{{ $comment->body }}--}}
    {{--{{ $news->body }}--}}
    <hr>
    <br><br>
    {!! Form::open(['url'=>route('comments.update',[$news,$comment]),'method'=>'PUT']) !!}
    {{ csrf_field() }}
    <div class="form-group">
        {!! Form::label('comment','enter your comment: ') !!}
        {!! Form::textarea('body',$comment->body,['class'=>'form-control']) !!}
    </div>
    <br>
    <div class="form-group  ">
        {!! Form::submit('submit',['class'=>'btn btn-primary form-control']) !!}
    </div>


    {!! Form::close() !!}


    {!! Form::open(['url'=>route('comments.destroy',[$news,$comment]),'method'=>'delete']) !!}
    {{ csrf_field() }}
    <button type="submit" class="btn-success">delete</button>
    {!! Form::close() !!}

</body>
</html>