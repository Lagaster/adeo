@extends('layouts.client')
@section('title', 'ADEOINTL | ADEO| Program')
@push('css')
    <style>
      .blog_right_sidebar .single_sidebar_widget{
        position: relative;
        margin-top: 0px;
       /* box-shadow:  1px 1px 15px #888888; */
        padding: 0px !important;
      }
      .recent_program{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: row;
        padding: 0px;
        margin: 0px;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 10px;
        font-size: 14px;

      }
    </style>
@endpush
@section('content')
<div class="slider-area">
    <div class="slider-height2 slider-bg2 d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="hero-caption hero-caption2">
              <h2>Works</h2>
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
                    src="{{ $work->workAvatar() }}" height="500px" width="100%"
                    alt=""
                  />
                  {{--  <a href="#" class="blog_item_date">
                    {{$work->created_at}}
                  </a>  --}}
                </div>
                <div class="blog_details">
                  <a class="d-inline-block" href="#">
                    <h2 class="blog-head" style="color: #2d2d2d">
                      {{$work->title}}
                    </h2>
                  </a>
                  <p>
                    @php
                    echo $work->description;
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
            @foreach ($workside as $work)
            {{--  <div class="media post_item ">  --}}
              <a href="{{ route('work', $work->id) }}"  class="recent_program">
              <img src="{{ $work->workAvatar() }}" width="200" height="150" alt=" {{$work->title}}" />
              <div class="media-body">
                  <h3 style="color: #2d2d2d">
                    {{$work->title}}
                  </h3>
                {{--  <p>{{$work->created_at}}</p>  --}}
              </div>
            </a>
            {{--  </div>  --}}
            @endforeach
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection