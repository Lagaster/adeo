<header>
    <div class="header-area ">
        <div class="main-header header-sticky ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between flex-wrap position-relative">

                        <div class="left-side d-flex align-items-center">
                            <div class="logo">
                                <a href="{{ route('page.index') }}"><img src="{{asset('assets/img/logo/logo.jpg')}}" alt="ADEO"></a>
                            </div>

                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{ route('page.index') }}">Home</a></li>
                                        <li><a href="#">Who we are?</a></li>
                                        <li><a href="{{ route('projects') }}">Projects</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Blog</a>
                                            <ul class="submenu">
                                                <li><a href="#">Gallery</a></li>
                                                <li><a href="#">Contact Us</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Contact Us</a></li>
                                        <li>
                                            @auth
                                            <a href="{{ route('home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                                            @endauth

                                            @guest
                                            @if (Route::has('login'))
                                            
                                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
                                           
                                            @endif
                                            @endguest
                                        </li>


                                    </ul>

                                </nav>
                            </div>
                        </div>
                        <div class="header-right-btn f-right  ml-15">
                            <a  href="#" class="btn_call_us_header inline-block ">Call Us : <span>
                                    070000000</span></a>
                            {{--  <a href="#" class="btn_1 header-btn"><i class="fas fa-heart"></i>Make a
                                Donation</a>  --}}
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
