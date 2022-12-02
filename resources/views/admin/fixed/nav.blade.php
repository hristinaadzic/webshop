<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="../../index.html"><img src="{{asset('admin-assets/images/logo.svg')}}" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="{{asset('admin-assets/images/logo-mini.svg')}}" alt="logo"/></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="typcn typcn-th-menu"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                    <h6 class="date mb-0">Today is {{date("d.m.Y.")}}</h6>
                    <i class="typcn typcn-calendar"></i>
                </a>
            </li>
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center" href="{{route('home')}}"> Go to home page
                </a>
            </li>
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center" href="{{route('logout')}}"> Logout
                </a>
            </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin-brands')}}">Brands</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('brands.create')}}">Create brand</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin-categories')}}">Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('categories.create')}}">Create category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin-users')}}">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin-products')}}">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('products.create')}}">Create product</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin-volumes')}}">Volumes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('volumes.create')}}">Create volume</a>
        </li>
    </ul>
</nav>
