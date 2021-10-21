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

        <div class="row">
            <div class="col-md-6">
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

            <div class="col-md-6">
                <div class="card">
                    <img src="{{ asset("storage/$post->picture") }}" style="object-fit: cover; height: 200px;" class="card-img-top">
                </div>

                <form method="post" action="{{ route('articleUpdatePicture', $post->id)}}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="picture"> Picture </label>
                        <input type="file" id="picture" name="picture" class="form-control" accept="image/*" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Picture </button>
                </form>
            </div>
        </div>


    </div>

@endsection
