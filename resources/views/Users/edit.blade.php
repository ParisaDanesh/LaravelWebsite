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
<h1> edit your news </h1>
<hr/>

{!! Form::open(['url'=>route('news.update',$news->id),'method'=>'PUT']) !!}

<div class="form-group">
    {!! Form::label('title','title: ') !!}
    {!! Form::text('title',$news->title,['class'=>'form-control']) !!}
</div>
<br>
<div class="form-group">
    {!! Form::label('body','body: ') !!}
    {!! Form::textarea('lname',$news->body,['class'=>'form-control']) !!}
</div>
<br>
<div class="form-group  ">
    {!! Form::submit('submit',['class'=>'btn btn-primary form-control']) !!}
</div>


{!! Form::close() !!}
</body>
</html>