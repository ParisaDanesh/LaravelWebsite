@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{--<div class="card-header">Dashboard</div>--}}

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <h1> create a News </h1>
    <hr/>
    {!! Form::open(['url'=>route('news.store'),'method'=>'post']) !!}
        {{--{{method_field('post')}}--}}
        {{ csrf_field() }}
        <div class="form-group">
            {!! Form::label('title','title: ') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <br>
        <div class="form-group">
            {!! Form::label('body','body: ') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
        <br>
        <div class="form-group  ">
            {!! Form::submit('submit',['class'=>'btn btn-primary form-control']) !!}
        </div>


    {!! Form::close() !!}

@endsection