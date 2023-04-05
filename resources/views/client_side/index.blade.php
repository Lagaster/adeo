@extends('layouts.client')
@section('content')
    <div class="slider-area position-relative">
        <div class="slider-active">

            <div class="single-slider slider-height slider-bg1 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 col-sm-10">
                            <div class="hero-caption">
                                <h1 data-animation="fadeInUp" data-delay=".2s">Give a helping hand to those who need
                                    it!</h1>
                                <P data-animation="fadeInUp" data-delay=".4s">When a child gets access to good food,
                                    it can change just about everything.</P>
                                <a href="programs.html" class="btn_1 hero-btn" data-animation="fadeInUp"
                                    data-delay=".8s">Ongoing Programs</a>
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

                    <div class="about-img about-img1  ">
                        <img src="assets/img/gallery/about1.jpg" alt="">
                    </div>
                </div>
                <div class="offset-xl-1 col-xxl-4 col-xl-6 col-lg-6 col-md-9">
                    <div class="about-caption about-caption1">

                        <div class="section-tittle mb-25">
                            <span>Introduction & background</span>
                            <h2>ADEO</h2>
                            <p class="mb-30">African Development and Emergency Organization (ADEO) is registered in Kenya, with its headquarter
                                in Nairobi and has representation/ presence in Kenya, Uganda, Sierra Leone, Southern Sudan and
                                Somalia.
                                ADEO has demonstrated ability to successfully implement major relief and development programs in the
                                sectors of health and education, for the last 10 years as an implementing partner of Global Fund(Red
                                Cross) , United Nations, USAID/FHI, USAID/PATH, NACC, private funding institutions, other donors
                                and Governments of Kenya.</p>
                        </div>
                        {{-- <div class="double-btn d-flex flex-wrap">
                            <a href="#" class="btn_01 mr-15">Donate Now</a>
                            <a href="programs.html" class="border-btn">View Programs</a>
                        </div> --}}
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

                        <div class="section-tittle mb-10">
                            <span>About Us</span>
                            <h2>STRATEGY</h2>
                            <p class="mb-50 pt-20">It is ADEO's policy to employ community based development strategies where existing community
                                structures, e.g., women groups, youth groups, and locally acceptable methods for mobilization are the
                                starting point for action. Our approach is to recognize and improve on what is existing, thereby
                                promoting local organizational capacity, which communities require to recognize, to be able to solve their
                                own problems.</p>
                        </div>
                        <a href="#" class="btn_01">Discover More</a>
                    </div>
                </div>
                <div class="offset-xxl-1 col-xxl-6 col-xl-7 col-lg-6 col-md-10">

                    <div class="about-img about-img1  ">
                        <img src="assets/img/gallery/about2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- <div class="class-offer-area fix">
        <div class="container-fluid p-0">
            <div class="class-offer-active row">
                <div class="col-lg-4 col-md-6 col-sm-6">

                    <div class="properties pb-30">
                        <div class="properties__card">
                            <div class="properties__img">
                                <a href="#"><img src="assets/img/gallery/class-img1.jpg" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <h3><a href="#">Help the ecosystems</a></h3>
                                <p>Sedac odio aliquet, fringilla odio eget, tincidunt nunc duis aliquet pulvinar
                                    ante start in life and the opportunity to learn. </p>
                            </div>
                            <div class="properties__footer d-flex flex-wrap justify-content-between align-items-center">
                                <div class="class-day">
                                    <span>$67,845</span>
                                    <p>Goal</p>
                                </div>
                                <div class="class-day">
                                    <span>$48,845</span>
                                    <p>Raised</p>
                                </div>
                                <div class="class-day">
                                    <a href="#" class="btn_01">Donate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">

                    <div class="properties pb-30">
                        <div class="properties__card">
                            <div class="properties__img">
                                <a href="#"><img src="assets/img/gallery/class-img2.jpg" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <h3><a href="#">Donate Vitamin B12 Program</a></h3>
                                <p>Sedac odio aliquet, fringilla odio eget, tincidunt nunc duis aliquet pulvinar
                                    ante start in life and the opportunity to learn. </p>
                            </div>
                            <div class="properties__footer d-flex flex-wrap justify-content-between align-items-center">
                                <div class="class-day">
                                    <span>$67,845</span>
                                    <p>Goal</p>
                                </div>
                                <div class="class-day">
                                    <span>$48,845</span>
                                    <p>Raised</p>
                                </div>
                                <div class="class-day">
                                    <a href="#" class="btn_01">Donate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">

                    <div class="properties pb-30">
                        <div class="properties__card">
                            <div class="properties__img">
                                <a href="#"><img src="assets/img/gallery/class-img3.jpg" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <h3><a href="#">View Savers In Deworm Program</a></h3>
                                <p>Sedac odio aliquet, fringilla odio eget, tincidunt nunc duis aliquet pulvinar
                                    ante start in life and the opportunity to learn. </p>
                            </div>
                            <div class="properties__footer d-flex flex-wrap justify-content-between align-items-center">
                                <div class="class-day">
                                    <span>$67,845</span>
                                    <p>Goal</p>
                                </div>
                                <div class="class-day">
                                    <span>$48,845</span>
                                    <p>Raised</p>
                                </div>
                                <div class="class-day">
                                    <a href="#" class="btn_01">Donate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


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
                            <p class="mb-30">To improve the quality of life of the vulnerable and disadvantaged in society through promotion
                                of community empowerment and equity in Africa.</p>
                            {{-- <a href="#" class="border-btn">Join Us Today</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="our-services-area section-img-bg section-padding" data-background="assets/img/gallery/section-bg1.jpg">
        <div class="container">
            <div class="row justify-content-center mb-25">
                <div class="col-xl-12">

                    <div class="section-tittle section-tittle2 text-center">
                        <span>Helping today</span>
                        <h2>How we help people</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="single-services1 text-center">
                        <div class="services-ion">
                            <img src="assets/img/icon/services1.svg" alt="">
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Pure Food & Water</a></h5>
                            <p>Odio aliquet, fringilla odio eget, tincidunt
                                nunc duis aliquet pulvinar ante employees and organizations to support.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="single-services1 text-center">
                        <div class="services-ion">
                            <img src="assets/img/icon/services2.svg" alt="">
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Health & Medicine</a></h5>
                            <p>Odio aliquet, fringilla odio eget, tincidunt
                                nunc duis aliquet pulvinar ante employees and organizations to support.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                    <div class="single-services1 text-center">
                        <div class="services-ion">
                            <img src="assets/img/icon/services3.svg" alt="">
                        </div>
                        <div class="services-cap">
                            <h5><a href="#">Education</a></h5>
                            <p>Odio aliquet, fringilla odio eget, tincidunt
                                nunc duis aliquet pulvinar ante employees and organizations to support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="home-blog section-padding">
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
                                <img src="assets/img/gallery/blog2.jpg" alt="">
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
    </div>
@endsection
