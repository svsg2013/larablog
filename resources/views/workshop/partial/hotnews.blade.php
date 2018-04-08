<section class="section tab-post mb-10">
    <div class="title-wrap">
        <h3 class="section-title">Tin mới</h3>

        <div class="tabs tab-post__tabs">
            <ul class="tabs__list">
                <li class="tabs__item tabs__item--active">
                    <a href="#tab-all" class="tabs__trigger">All</a>
                </li>
                {!! $tabMenu !!}
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
                {!! $tabNews !!}
         <!-- end pane 2 -->
    </div> <!-- end tab content -->
</section>