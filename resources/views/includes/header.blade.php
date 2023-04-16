<header>
    <div class="header-area ">
        <div class="main-header header-sticky ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between flex-wrap position-relative">

                        <div class="left-side d-flex align-items-center">
                            <div class="logo">
                                <a href="index-2.html"><img src="assets/img/logo/logo.jpg" alt=""></a>
                            </div>

                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('home') }}">Home</a></li>
                                        <li><a href="{{route('whoweare')}}">Who we are?</a></li>
                                        <li><a href="{{ route('programs') }}">Programs</a></li>
                                        <li><a href="">About</a></li>
                                        <li><a href=" ">Blogs</a>
                                            <ul class="submenu">
                                                <li><a href="#">Blog</a></li>
                                                <li><a href="b#">Blog Details</a></li>
                                                <li><a href="#">Elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        <li>
                                            @if (Route::has('login'))
                                                @auth

                                                    <a href="{{ url('/home') }}"
                                                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                                                @else
                                            <li>
                                                <a href="{{ route('login') }}"
                                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                                    in</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li>
                                                    <a href="{{ route('register') }}"
                                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                                </li>
                                            @endif
                                        @endauth

                                        @endif
                                        </li>


                                    </ul>

                                </nav>
                            </div>
                        </div>
                        <div class="header-right-btn f-right  ml-15">
                            <a href="tel:+254722725994" class="header-btn2 d-none d-xxl-inline-block">Call Us : <span>
                                    0722 725 994</span></a>
                            {{-- <a href="#" class="btn_1 header-btn"><i class="fas fa-heart"></i>Make a
                                Donation</a> --}}
                        </div>

                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
