<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class -->
        <!-- with font-awesome or any other icon font library -->
        
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('programs.index') }}" class="
            {{ Request::is('admin/programs*') ? 'active' : ''  }}
            nav-link">
                <i class="fa fa-tasks" aria-hidden="true"></i>
                <p>
                    Programs
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.index') }}" class="
            {{ Request::is('admin/users*') ? 'active' : '' }}
            nav-link">
                <i class="fa fa-users" aria-hidden="true"></i>
                <p>
                    Users
                </p>
            </a>
        </li>

    </ul>
</nav>