@extends('layouts.layout')

@section('title')
    Mon titre de test
@endsection

@section('content')

    <!-- to display a variable -->
    {{ $loading }}

    <!-- to display a concatenated variable -->
    {{ $loading . $loading}}

    @if($loading)

        {{-- Si loading vaut true --}}
        <p>Chargement ...</p>

    @else

        {{-- Si loading vaut true --}}
        <h1>Mon titre</h1>

        <ul>

            @foreach($posts as $post)

                <li>{{$post}}</li>

            @endforeach

        </ul>

    @endif

@endsection