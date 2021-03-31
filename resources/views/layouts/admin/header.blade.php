<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">
                <img class="img-avatar" src="{{ asset('admin/img/avatars/default-avatar.jpg') }}"
                     alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                </div>
                <a class="dropdown-item" href="{{ url('/logout') }}">
                    <i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>
</header>
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('blogs.index') }}">
                        <i class="nav-icon cui-user"></i> Blogs</a>
                </li>
                @admin
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('categories.index') }}">
                            <i class="nav-icon cui-user"></i> Categories</a>
                    </li>
                <li class="nav-item">
                        <a class="nav-link " href="{{ route('subcategories.index') }}">
                            <i class="nav-icon cui-user"></i> SubCategories</a>
                    </li>
                @endadmin
            </ul>
        </nav>
    </div>
