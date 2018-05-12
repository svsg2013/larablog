<section class="section tab-post mb-10">
    <div class="title-wrap">
        <h3 class="section-title">Máy Lup-be</h3>

        <div class="tabs tab-post__tabs">
            <ul class="tabs__list">
                <li class="tabs__item tabs__item--active">
                    <a href="#tab-all" class="tabs__trigger">All</a>
                </li>
                @foreach($infoNews as $getCate)
                    <li class="tabs__item">
                        <a href="#{{$getCate['cateSlug']}}" class="tabs__trigger">{{$getCate['cateName']}}</a>
                    </li>
                @endforeach
            </ul> <!-- end tabs -->
        </div>
    </div>

    <!-- tab content -->
    <div class="tabs__content tabs__content-trigger tab-post__tabs-content">

        <div class="tabs__content-pane tabs__content-pane--active" id="tab-all">
            <div class="row">
                    {!! $thisNews !!}
            </div>
        </div> <!-- end pane 1 -->
        @foreach($infoNews as $fuckAll)
            <div class="tabs__content-pane" id="{{$fuckAll['cateSlug']}}">
                <div class="row">
                    @foreach($fuckAll['CateAndNews'] as $fuck)
                        <div class="col-md-6">
                            <article class="entry">
                                <div class="entry__img-holder">
                                    <a href="{{route('postNews',['id' =>$fuck->newsID,'newsSlug' =>$fuck->newsSlug])}}">
                                        <div class="thumb-container thumb-75">
                                            <img data-src="{{asset('upload/thumbnail/' . $fuck->images)}}" src="{{asset('upload/thumbnail/' . $fuck->images)}}"
                                                 class="entry__img lazyload" alt="{{$fuck->title}}"/>
                                        </div>
                                    </a>
                                </div>

                                <div class="entry__body">
                                    <div class="entry__header">
                                        <a href="{{route('catePost',[$fuck->cateID,$fuck->cateSlug])}}" class="entry__meta-category">{{$fuck->name}}</a>
                                        <h2 class="entry__title">
                                            <a href="{{route('postNews',['id' =>$fuck->newsID,'newsSlug' =>$fuck->newsSlug])}}">{{$fuck->title}}</a>
                                        </h2>
                                        <ul class="entry__meta">
                                            <li class="entry__meta-date">
                                                <i class="ui-date"></i>
                                                {{date('d-m-Y', strtotime($fuck->newsDate))}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="entry__excerpt">
                                        <p>{{truncateStringWords($fuck->summary, 180)}}</p>
                                    </div>
                                </div>
                            </article>
                        </div><!-- col-6 -->
                    @endforeach
                </div><!-- row -->
            </div> <!-- end pane -->
        @endforeach

    </div> <!-- end tab content -->
</section>