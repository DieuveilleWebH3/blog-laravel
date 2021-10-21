@extends('layouts.layout')

@section('content')

    <a href="{{ route('articleList')}}">
        <h2>Go Back</h2>
    </a>

    <div class="container">
        <div class="card">
            <img src="{{ asset("storage/$post->picture") }}" style="object-fit: cover; height: 200px;" class="card-img-top">
        </div>

        <h1>{{$post -> title}}</h1>

        <p>{{$post -> extrait}}</p>

        @if($post -> created_at)
            <p> Créé le {{$post -> created_at ->format('d/m/y')}}</p>
        @endif

        <p>{{$post -> description}}</p>


        <a href="{{ route('articleShowUpdate', $post->id)}}">Update</a>
    </div>

@endsection
