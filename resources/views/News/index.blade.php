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




    <h1 style="text-align: center;"> News </h1>
    <hr style="color: red;">
    @foreach( $news as $post)
        <div style="text-align: center;">
            <h4>{{ $post->user->name }} :</h4>
            <h4>
                <a href="{{ route('news.show' ,[$post->id]) }}"> {{ $post -> title }} </a>
            </h4>

            <div class="body">
                {{ $post ->body }}
            </div>
            <hr>
        </div>
    @endforeach

    {{--  $news->links() --}}
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="btn btn-group" style="text-align: center;">
        {{--<button onclick="">login</button>--}}
        <button onclick="location.href='{{url('/news/create')}}'" class="btn-success">add news</button>
    </div>

@endsection




