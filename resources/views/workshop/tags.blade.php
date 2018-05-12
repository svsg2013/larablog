@extends('workshop')
@section('content')
@section('body')
    <body class="bg-light single-post">
    @endsection
    <div class="col-lg-8 blog__content mb-30">

        <div class="title-wrap">
            @foreach($tags as $tag)
                <h1>{{$tag->title}}</h1>
            @endforeach
        </div>

        <div class="row">
            {!! $thisTags !!}
        </div>

    </div> <!-- end col -->
@endsection