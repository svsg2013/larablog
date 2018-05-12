@extends('workshop')
@section('content')
  <div class="row">

    <!-- Posts -->
    <div class="col-lg-8 blog__content mb-30">

      <!-- Hot News -->
      @include('workshop.partial.hotnews')
      <!-- end hot news -->

      <!-- hot prod -->
      @include('workshop.partial.hotprod')
     <!-- end hot prod -->

      <!-- Ad Banner 728 -->
      @include('workshop.partial.adbannermid')

      <!-- Editor's Picks -->
      @include('workshop.partial.hightlightpost')
       <!-- end editors picks -->

      <!-- Posts from categories -->
      @include('workshop.partial.showpost')
      <!-- end posts from categories -->

      <!-- Carousel posts -->
      @include('workshop.partial.slideprod')


    </div> <!-- end posts -->

    <!-- Sidebar -->
    @include('workshop.partial.sidebar')
    <!-- end sidebar -->

  </div>
@endsection