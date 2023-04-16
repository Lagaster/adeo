@extends('layouts.client')
@section('title', 'ADEOINTL | ADEO| Programs')
@section('content')
<div class="slider-area">
    <div class="slider-height2 slider-bg2 d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="hero-caption hero-caption2">
              <h2>Programs</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="blog_area section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
          <div class="blog_left_sidebar">
          

           
            <article class="blog_item">
                <div class="blog_item_img">
                  <img
                    class="card-img rounded-0"
                    src="{{ $program->programAvatar() }}" height="500px" width="100%"
                    alt=""
                  />
                  <a href="#" class="blog_item_date">
                    {{$program->created_at}}
                  </a>
                </div>
                <div class="blog_details">
                  <a class="d-inline-block" href="blog_details.html">
                    <h2 class="blog-head" style="color: #2d2d2d">
                      {{$program->title}}
                    </h2>
                  </a>
                  <p>
                    @php
                    echo $program->description;
                @endphp
                    
                  </p>
                </div>
              </article>
                
          </div>
        </div>
        <div class="col-lg-4">
          <div class="blog_right_sidebar">
            <aside class="single_sidebar_widget popular_post_widget">
              <h3 class="widget_title" style="color: #2d2d2d">
                Recent Programs
              </h3>
            @foreach ($programside as $program)
            <div class="media post_item">
              <img src="{{ $program->programAvatar() }}" alt="post" />
              <div class="media-body">
                <a href="blog_details.html">
                  <h3 style="color: #2d2d2d">
                    {{$program->title}}
                  </h3>
                </a>
                <p>{{$program->created_at}}</p>
              </div>
            </div>
            @endforeach
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection