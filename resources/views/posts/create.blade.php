@extends('layouts.layout')

@section('content')

    <div class="container">
        <h1> Hello Create a new blog Article</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p style="color: red">{{$error}}</p>
            @endforeach
        @endif

        <div class="form-group">
            <form method="post" action="{{ route('articleStore')}}">

                @csrf

                <div class="form-group">
                    <label for="title"> Titre </label>
                    <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="extrait"> Extrait </label>
                    <input type="text" id="extrait" name="extrait" value="{{old('extrait')}}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description"> Description </label>
                    <textarea rows="5" id="description" name="description" value="{{old('description')}}" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add blog</button>
            </form>
        </div>
    </div>

@endsection
