@extends('layouts.layout')

@section('content')

    <a href="{{ route('articleList')}}">
        <h2>Go Back</h2>
    </a>

    <div class="container">
        <h1>{{$post -> title}}</h1>

        <p>{{$post -> extrait}}</p>

        @if($post -> created_at)
            <p> Créé le {{$post -> created_at ->format('d/m/y')}}</p>
        @endif

        <p>{{$post -> description}}</p>


        <a href="{{ route('articleShowUpdate', $post->id)}}">Update</a>
    </div>

@endsection
