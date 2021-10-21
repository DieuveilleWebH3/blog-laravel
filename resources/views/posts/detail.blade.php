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

        <div class="d-flex">
            <a href="{{ route('articleShowUpdate', $post->id)}}">Update</a>
        </div>

        <h1>Comments</h1>


        @if(sizeof($post->comments)>0)
            <ul>
                @foreach($post->comments as $comment)
                    <li>
                        {{$comment->content}}
                    </li>

                @endforeach
            </ul>
        @else
            <p>There are no comments</p>
        @endif
    </div>

@endsection
