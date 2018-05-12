@extends('workshop')
@section('content')
@section('body')
    <body class="bg-light single-post">
@endsection
    <div class="row">
        <div class="col-lg-8 blog__content mb-30" style="text-align: justify">

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li class="breadcrumbs__item">
                    <a href="index.html" class="breadcrumbs__url"><i class="ui-home"></i></a>
                </li>
                <li class="breadcrumbs__item">
                    <a href="index.html" class="breadcrumbs__url">News</a>
                </li>
                <li class="breadcrumbs__item breadcrumbs__item--current">
                    World
                </li>
            </ul>

            <!-- standard post -->
            <article class="entry">
                {!! $thisSinglePost !!}
                <!-- Prev / Next Post -->
                <nav class="entry-navigation">
                    <div class="clearfix">
                        <div class="entry-navigation--left">
                            <i class="ui-arrow-left"></i>
                            <span class="entry-navigation__label">Previous Post</span>
                            <div class="entry-navigation__link">
                                @if($preNews)
                                    <a href="{{route('postNews',[$preNews->id,$preNews->alias])}}" rel="prev">{{$preNews->title}}</a>
                                @endif
                            </div>
                        </div>
                        <div class="entry-navigation--right">
                            <span class="entry-navigation__label">Next Post</span>
                            <i class="ui-arrow-right"></i>
                            <div class="entry-navigation__link">
                                @if($nextNews)
                                    <a href="{{route('postNews',[$nextNews->id,$nextNews->alias])}}" rel="prev">{{$nextNews->title}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Related Posts -->
                <div class="related-posts">
                    <div class="title-wrap mt-40">
                        <h5 class="uppercase">Tin lien quan</h5>
                    </div>
                    {!! $thisRelate !!}
                </div> <!-- end related posts -->

            </article> <!-- end standard post -->
        </div>
    </div>
@endsection
