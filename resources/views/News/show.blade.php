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

        <h4> {{ $news->user->name }} :</h4>
        <h1>{{ $news->title }}</h1>
        <p>{{ $news->body }}</p>
        @can('view',$news)
            <button onclick="location.href='{{route('news.edit',$news->id)}}'" class="btn-success">edit</button>
            {!! Form::open(['url'=>route('news.destroy',$news->id),'method'=>'delete']) !!}
            {{ csrf_field() }}
            <button type="submit" class="btn-success">delete</button>
            {!! Form::close() !!}
        @endcan
        <hr>
        <br><br>
        comments : <br>

        <ul>
            @foreach($news->comments as $comment)
                @can('commentEdit',[$comment,$news])
                    {{--<li>{{ $comment->user->name }} : <a href="/news/{{$news->id}}/comment/{{$comment->id}}/edit"> {{ $comment->body }} </a></li>--}}
                    <li>{{ $comment->user->name }} : <a href="{{ route('comments.edit',[$news , $comment])  }}"> {{ $comment->body }} </a></li>
                @endcan
                @cannot('commentEdit',[$comment,$news])
                    <li>{{ $comment->user->name }} : {{ $comment->body }}</li>
                @endcannot

                {{--// mikham age comment male khode user bood , delete o edit barash faal she ! albate na too in safe--}}

                {{-- alan vayad gate use kOnim--}}
            @endforeach
        </ul>


        <hr>
        <br><br>
        {!! Form::open(['url'=>route('news.comment',$news->id),'method'=>'post']) !!}
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('comment','enter your comment: ') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
        <br>
        <div class="form-group  ">
            {!! Form::submit('submit',['class'=>'btn btn-primary form-control']) !!}
        </div>


        {!! Form::close() !!}

</body>
</html>