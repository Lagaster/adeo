@extends('layouts.client')
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
                <div class="col-md-4">
                    <div class="blog_left_sidebar">


                        @foreach ($programs as $program)
                         <a href="{{route('program',$program->id)}}" target="_blank" rel="noopener noreferrer">
                          <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ $program->programAvatar() }}" height="300px"
                                    width="100%" alt="" />
                                <a href="#" class="blog_item_date">
                                    {{ $program->created_at }}
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block">
                                    <h2 class="blog-head" style="color: #2d2d2d">
                                        {{ $program->title }}
                                    </h2>
                                </a>
                            </div>
                        </article></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
