@extends('layouts.layout')

@section('content')
    <div class="container">

        <h1>Liste de Catégories</h1>

        <div>
            <ul>
            @foreach($categories as $category)
                <li>
                    <div class="row">
                        <div class="col-sm-3">
                            {{$category->name}}
                        </div>

                        <div class="col-sm-3" style="display: inline-block;">
                            <form method="post" action="{{route('categoryDelete', $category->id)}}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm" type="submit">
                                    <i class="fa fa-trash" style="font-size:18px; color: red;" aria-hidden="true"></i>
                                </button>
                            </form>

                            <button id="that{{$category->id}}" data-id="{{$category->name}}" onclick="showDiv({{$category->id}})" class="btn btn-sm" type="submit" style="display: inline-block;">
                                <i id="edit" class="fa fa-edit" style="font-size:18px; color: green;" aria-hidden="true"></i>
                            </button>

                        </div>

                        <div id="div_edit_category{{$category->id}}" style="display:none;">
                            <form method="post" action="{{route('categoryUpdate', $category->id)}}" style="display: inline-block;">
                                @csrf
                                @method('PUT')

                                <label for="name">Modify Category</label>
                                <input id="name" name="name" type="text" value="{{$category->name}}" required>

                                <button class="btn btn-primary btn-sm" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </li>

            @endforeach
            </ul>

            <script>
                // $("#edit").click(function()
                function showDiv(temp)
                // $(document).on("click", "#editFeature", function()
                {
                    // var the_id = this.id;


                    // var the_id = document.getElementById("that");
                    // the_id = the_id.data('id');


                    // var the_id = $('#that').data('id');

                    // var the_id = $(this).data('id');
                    // console.log(" the id is ", the_id);

                    console.log(" or the id is ", temp);

                    document.getElementById("div_edit_category"+temp).style.display = "block";
                }
                // );
            </script>

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
