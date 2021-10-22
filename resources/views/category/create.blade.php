@extends('layouts.layout')


@section('content')
    <div class="container">

        <h1>Ma liste d'articles</h1>

        <div>
            <ul>
            @foreach($categories as $category)
                <li>
                    <div class="row">
                        <div class="col-sm">
                            {{$category->name}}
                        </div>

                        <div class="col-sm">
                            <form method="post" action="{{route('categoryDelete', $category->id)}}">
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

        </div>


        <h1> Hello Create a new blog Category</h1>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p style="color: red">{{$error}}</p>
            @endforeach
        @endif

        <div class="form-group">
            <form method="post" action="{{ route('categoryStore')}}">

                @csrf

                <div class="form-group">
                    <label for="name"> Titre </label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Add blog Category</button>
            </form>
        </div>
    </div>
@endsection
