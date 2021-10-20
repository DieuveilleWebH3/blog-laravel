@extends('layouts.layout')

@section('content')
        <div>
           <a href="{{ route('articleCreate')}}">
               <h4>Create a Post</h4>
           </a>
        </div>

        <h1>Ma liste d'articles</h1>

        <ul>

            @foreach($posts as $post)

                <li>
                    {{-- <a href="articles/{{$post -> id}}"> --}}
                    <a href="{{ route('articleDetail', $post -> id )}}">
                        <h2>{{$post -> title}}</h2>
                    </a>
                    <p>{{$post -> extrait}}</p>

                    {{-- if the route is get , but that's not safe --}}
                    {{-- <a href="{{ route('articleDelete', $post->id)}}" class="btn btn-danger">Remove</a> --}}

                    <form method="post" action="{{ route('articleUpdate', $post->id)}}">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-warning">Update</button>
                    </form>

                    <form method="post" action="{{ route('articleDelete', $post->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Remove</button>
                    </form>
                </li>

            @endforeach

        </ul>

@endsection

@section('javascript')

@endsection
