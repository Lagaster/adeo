<header>
    @php
function isActiveRoute($routeName)
{
    return request()->routeIs($routeName);
}
@endphp
    <div class="header-area ">
        <div class="main-header header-sticky ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between flex-wrap position-relative">

                        <div class="left-side d-flex align-items-center">
                            <div class="logo">
                                <a href="{{ route('page.index') }}"><img height="120px" width="120px"
                                        src="{{ asset('assets/img/logo/logo.jpg') }}" alt="ADEO"></a>
                            </div>

                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="
                                            {{ isActiveRoute('page.index') ? 'active' : '' }}
                                            " href="{{ route('page.index') }}">Home</a></li>
                                        {{-- <li><a href="{{route('whoweare')}}">Who we are?</a></li> --}}
                                        <li><a 
                                            class="{{ (isActiveRoute('programs') || isActiveRoute('program')) ? 'active' : '' }}"
                                            href="{{ route('programs') }}">Programs</a></li>
                                        <li><a 
                                            class="{{ (isActiveRoute('works') || isActiveRoute('work')) ? 'active' : '' }}"
                                            href="{{route('works')}}">Prevous Works</a></li>
                                         
                                       {{-- <li><a href=" ">Blogs</a>
                                            <ul class="submenu">
                                                <li><a href="#">Gallery</a></li>
                                                <li><a href="#">Contact Us</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a
                                            class="{{ isActiveRoute('contact') ? 'active' : '' }}"
                                                href="{{ route('contact') }}">Contact Us</a>
                                            </li>
                                             
                                        <li>
                                            @auth
                                                <a 
                                                class="{{ isActiveRoute('home') ? 'active' : '' }}"
                                                href="{{ route('home') }}"
                                                    >Dashboard</a>
                                            @endauth

                                            @guest

                                                @if (Route::has('login'))
                                                    <a 
                                                    class="{{ isActiveRoute('login') ? 'active' : '' }}"
                                                    href="{{ route('login') }}" target="_blank"
                                                        >Login</a>
                                                @endif
                                            @endguest
                                        </li>

                                    </ul>

                                </nav>
                            </div>
                        </div>
                        <div class="header-right-btn f-right  ml-5">
                            <a href="tel:+254701347776" class="header-btn2 d-none d-xxl-inline-block">Call Us : <span>
                                    +254 701 347 776</span></a>
                            {{-- <a href="#" class="btn_1 header-btn"><i class="fas fa-heart"></i>Make a
                                Donation</a> --}}

                            <a href="tel:+254701347776" class="btn_call_us_header inline-block ">Call Us : <span>
                                +254 701 347 776</span></a>
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
