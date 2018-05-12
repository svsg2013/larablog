@extends('workshop')
@section('content')
@section('body')
    <body class="bg-light single-post">
    @endsection
    <div class="col-lg-8 blog__content mb-30">

        <div class="title-wrap">
            @foreach($nameCate as $name)
                <h1>{{$name->name}}</h1>
            @endforeach
        </div>

        <div class="row">
            {!! $thisCategories !!}
        </div>

    </div> <!-- end col -->
@endsection