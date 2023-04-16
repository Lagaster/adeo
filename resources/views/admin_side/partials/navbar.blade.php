<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Programs</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- login user Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
          <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <span class="name pl-2 text-capitalize ">{{ Auth::user()->name }}</span>
           
            
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="{{ route('users.show',Auth::user()->id) }}" class="dropdown-item profile-show">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ Auth::user()->avatarView() }}" alt="{{ Auth::user()->name }}" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    {{ Auth::user()->name }}
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Member since</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ Auth::user()->created_at->format('d/M/Y') }}</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
           
            <div class="dropdown-divider"></div>
           
            <div class="dropdown-divider"></div>
            <a href="#" id="logout-link"  class="dropdown-item dropdown-footer">
              <span><i class="fas fa-sign-out-alt"></i></span>
              <span>Logout</span>
            </a>
          </div>
        </li>

      
       
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
      
    </ul>
</nav>