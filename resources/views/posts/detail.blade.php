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
                        {{--
                        <div class="col-md-6">
                            <span>{{$comment->content}}</span>

                             can't work because link request get and not delete method
                             <span><a href="{{route('commentDelete', $comment->id)}}"><i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a></span>
                        </div>
                        --}}

                        <div class="row">
                            <div class="col-sm">
                                {{$comment->content}}
                            </div>

                            <div class="col-sm">
                                <form method="post" action="{{route('commentDelete', $comment->id)}}">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm" type="submit">
                                        <i class="fa fa-trash" style="color: red;" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>

                @endforeach
            </ul>
        @else
            <p>There are no comments</p>
        @endif

        <form method="post" action="{{route('commentAdd', $post->id)}}">
            @csrf

            <div class="form-group">
                <label for="content">Add Comment</label>

                <textarea id="content" name="content" class="form-control" required></textarea>
            </div>

            <button class="btn btn-danger">Comment</button>
        </form>
    </div>

@endsection
