@extends('layouts.client')
@section('title', 'ADEOINTL | ADEO| Programs')
@push('css')
    <style>
        .blog_left_sidebar{
            position: relative;
            margin-top: 0px;
            box-shadow:  1px 1px 15px #888888;
           
        }
      
        .blog-head{
            color: #2d2d2d;
        }
        .blog-head:hover{
            color: green !important;
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
                @foreach ($programs as $program)
                    <div class="col-md-4">
                        <div class="blog_left_sidebar">
                            <a href="{{ route('program', $program->slug) }}" target="_blank" rel="noopener noreferrer">
                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="{{ $program->programAvatar() }}" height="300px"
                                            width="100%" alt="{{ $program->title }}" />
                                        {{--  <a href="#" class="blog_item_date">
                                            {{ $program->created_at }}
                                        </a>  --}}
                                    </div>
                                    <div class="blog_details">
                                        <a  href="{{ route('program', $program->slug) }}"  class="d-inline-block">
                                            <h2 class="blog-head" >
                                                {{ $program->title }}
                                            </h2>
                                        </a>
                                    </div>
                                </article>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 ">
                        {{ $programs->links() }}
                </div>
            </div>

        </div>
    </section>
@endsection
