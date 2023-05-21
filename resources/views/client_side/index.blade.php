@extends('layouts.client')
@section('title', 'ADEOINTL | ADEO')
@section('content')
    <div class="slider-area position-relative">
        <div class="slider-active">

            <div class="single-slider slider-height slider-bg1 d-flex align-items-center pt-3 ">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 col-sm-10">
                            <div class="hero-caption">
                                <h1 data-animation="fadeInUp" data-delay=".2s">Give a helping hand to those who need
                                    it!</h1>
                                <P data-animation="fadeInUp" data-delay=".4s">African Development and Emergency Organization
                                    (ADEO) is registered in Kenya and its headquarters Nairobi.</P>
                                <a href="{{ route('works') }}" class="btn_1 hero-btn" data-animation="fadeInUp"
                                    data-delay=".8s">ADEO PREVIOUS WORKS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="about-area1 section-bg pt-60 pb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-5 col-lg-6 col-md-8">

                    <div class="w3-content w3-section" style="max-width:500px">
                        <img class="mySlide w3-animate-fading" src="assets/img/slide/adeoin.jpg" style="width:100%">
                        <img class="mySlide w3-animate-fading" src="assets/img/slide/adeo.jpg" style="width:100%">
                        <img class="mySlide w3-animate-fading" src="assets/img/slide/a.jpg" style="width:100%">
                    </div>
                </div>
                <div class="offset-xl-1 col-xxl-4 col-xl-6 col-lg-6 col-md-9">
                    <div class="about-caption about-caption1">

                        <div class="section-tittle mb-25">
                            <span>Introduction & background</span>
                            <h2>ADEO</h2>
                            <p class="mb-30">African Development and Emergency Organization (ADEO) is registered in Kenya,
                                with its headquarter
                                in Nairobi and has representation/ presence in Kenya, Uganda, Sierra Leone, Southern Sudan
                                and
                                Somalia.
                                ADEO has demonstrated ability to successfully implement major relief and development
                                programs in the
                                sectors of health and education, for the last 10 years as an implementing partner of Global
                                Fund(Red
                                Cross) , United Nations, USAID/FHI, USAID/PATH, NACC, private funding institutions, other
                                donors
                                and Governments of Kenya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-area1 section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="about-caption about-caption2">

                        <div class="section-tittle mb-10">
                            <span>About Us</span>
                            <h2>STRATEGY</h2>
                            <p class="mb-50 pt-20">It is ADEO's policy to employ community based development strategies
                                where existing community
                                structures, e.g., women groups, youth groups, and locally acceptable methods for
                                mobilization are the
                                starting point for action. Our approach is to recognize and improve on what is existing,
                                thereby
                                promoting local organizational capacity, which communities require to recognize, to be able
                                to solve their
                                own problems.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="about-img about-img1  ">
                        <img src="assets/img/gallery/about2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    

    <section class="about-area1 section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="offset-xl-1 col-xxl-5 col-xl-5 col-lg-6 col-md-6">

                    <div class="about-img about-img1  ">
                        <img src="assets/img/gallery/about3.jpg" alt="">
                    </div>
                </div>
                <div class="offset-xl-1 col-xxl-5 col-xl-5 col-lg-6 col-md-6">
                    <div class="about-caption about-caption1">

                        <div class="section-tittle m-0">
                            <span>Vision</span>
                            <h2>Our Vision</h2>
                            <p class="mb-30">A fair, healthy, and informed society.</p>
                            {{-- <a href="#" class="border-btn">Join Us Today</a> --}}
                        </div>
                        <div class="section-tittle m-0">
                            <span>Mission</span>
                            <h2>Our Mission</h2>
                            <p class="mb-30">To improve the quality of life of the vulnerable and disadvantaged in society
                                through promotion
                                of community empowerment and equity in Africa.</p>
                            {{-- <a href="#" class="border-btn">Join Us Today</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="about-area1 section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-9">
                    <div class="about-caption about-caption2">
                        <div class="section-tittle mb-5">
                            <span>Modules</span>
                            <h2>ADEO implements six modules, namely:</h2>
                            <p class="mb-30">
                                <li>
                                    ● Treatment, Care, and Support (TCS)
    
                                </li>
                                <li>
                                    ● Prevention of Mother to Child Transmission (PMTCT)
    
                                </li>
                                <li>
                                    ● Differentiated HIV Testing Services (DHTS)
    
                                </li>
                                <li>
                                    ● Reducing Human Rights Related Barriers to HIV/TB services
    
                                </li>
                                <li>
                                    ● Resilient and Sustainable Systems for Health (RSSH): Health management information systems
                                    and M&E.
    
                                </li>
                                <li>
                                    ● Adolescents and Young People (AYP)
    
                                </li>
    
                                </p>
                        </div>
                        
                    </div>
                </div>
                <div class="w3-content w3-section" style="max-width:500px">
                    <img class="mySlides w3-animate-fading" src="assets/img/slide/a.jpg" style="width:100%">
                    <img class="mySlides w3-animate-fading" src="assets/img/slide/ade.jpg" style="width:100%">
                    <img class="mySlides w3-animate-fading" src="assets/img/slide/adeo.jpg" style="width:100%">
                </div>

            </div>
        </div>
    </section>
    {{-- <div class="home-blog section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-xl-3">
                    <div class="section-tittle mb-130">
                        <span>News</span>
                        <h2>Latest Blog</h2>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-9">
                    <div class="blog-active">

                        <div class="single-blogs">
                            <div class="blog-img">
                                <img src="assets/img/gallery/blog1.jpg" alt="">
                            </div>
                            <div class="blog-caption">
                                <h3><a href="#">Help the ecosystems</a></h3>
                                <p>Sedac odio aliquet, fringilla odio eget, tincidunt nunc duis aliquet pulvinar
                                    ante start in life and the opportunity to learn. </p>
                                <a href="#" class="browse-btn">Read More</a>
                            </div>
                        </div>

                        <div class="single-blogs">
                            <div class="blog-img">
                                <img src="assets/img/gallery/blog1.jpg" alt="">
                            </div>
                            <div class="blog-caption">
                                <h3><a href="#">Help the ecosystems</a></h3>
                                <p>Sedac odio aliquet, fringilla odio eget, tincidunt nunc duis aliquet pulvinar
                                    ante start in life and the opportunity to learn. </p>
                                <a href="#" class="browse-btn">Read More</a>
                            </div>
                        </div>

                        <div class="single-blogs">
                            <div class="blog-img">
                                <img src="assets/img/gallery/blog1.jpg" alt="">
                            </div>
                            <div class="blog-caption">
                                <h3><a href="#">Help the ecosystems</a></h3>
                                <p>Sedac odio aliquet, fringilla odio eget, tincidunt nunc duis aliquet pulvinar
                                    ante start in life and the opportunity to learn. </p>
                                <a href="#" class="browse-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
