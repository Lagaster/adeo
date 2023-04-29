@extends('layouts.client')
@section('title', 'ADEOINTL | ADEO| Gallery')
@section('content')

    <div class="slider-area">
        <div class="slider-height2 slider-bg2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="hero-caption hero-caption2">
                            <h2>Gallery</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="row">
                    @foreach ($images as $image)
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0 shadow">
                        <img src="{{ $image-> gallery_image() }}"
                            class="w-100 shadow-1-strong rounded mb-4 image" alt="Adeointl"
                            height="300px"
                            width="100px" 
                            />        
                    </div>  
                    @endforeach  
                    {{ $images->links('pagination::bootstrap-4') }}
                </div>
                <!-- Gallery -->
            </div>
        </div>
    </section>
    <!-- Gallery -->
    
@endsection
@push('css')
    <style>
        .image {
            max-height: 300px;
            object-fit: cover;
            object-position: center;
            border: none;
            border-radius: 10px;
            

        }
    </style>
@endpush