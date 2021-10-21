@extends('layouts.layout')

@section('content')

    <div class="container">
        <h1> Detail of {{$post->title}}</h1>

    </div>

    <div class="container">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p style="color: red">{{$error}}</p>
            @endforeach
        @endif

        <div class="form-group">
            <form method="post" action="{{ route('articleUpdate', $post->id)}}">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title"> Titre </label>
                    <input type="text" id="title" name="title" value="{{old('title', $post->title)}}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="extrait"> Extrait </label>
                    <input type="text" id="extrait" name="extrait" value="{{old('extrait', $post->extrait)}}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description"> Description </label>
                    <textarea rows="5" id="description" name="description" class="form-control" required>{{old('description', $post->description)}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update blog</button>
            </form>
        </div>
    </div>

@endsection
