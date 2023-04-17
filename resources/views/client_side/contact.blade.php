@extends('layouts.client')
@section('title', 'ADEOINTL | ADEO| Contact Us')
@section('content')
    <div class="slider-area">
        <div class="slider-height2 slider-bg2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <div class="hero-caption hero-caption2">
                            <h2>Contact Us Today!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8 contact-container">
                    @if (session('success'))
                        <div id="alert-success" class="alert alert-success alert-dismissible">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form class="form-contact contact_form" action="{{ route('contacts.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        id="name" type="text" value="{{ old('name') }}"
                                        placeholder="Enter your name" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                        id="email" type="email" value="{{ old('email') }}" placeholder="Email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control @error('subject') is-invalid @enderror" name="subject"
                                        id="subject" type="text" value="{{ old('subject') }}"
                                        placeholder="Enter Subject" />
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100 @error('message') is-invalid @enderror" name="message" id="message" cols="30"
                                        rows="9" placeholder="Enter Message here...">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">
                                Send
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Rongai Town ,Kajiado County</h3>
                            <p>P.o Box P.O. Box 50144, 00200</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3><a href="tel:+254722725994">0722 725 994</a></h3>

                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>
                                <a href="mailto:info@adeointl.org">info@adeointl.org</a>
                            </h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#alert-success').fadeOut('fast');
            }, 5000);
        });
    </script>
@endpush