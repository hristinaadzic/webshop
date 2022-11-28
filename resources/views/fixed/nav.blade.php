<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo">
                        <img src="assets/images/templatemo-eduwell.png" alt="Shop">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        @foreach($menu as $link)
                            <li class="">
                                <a href="{{ route($link["route"]) }}">{{ $link["name"] }}</a>
                            </li>
                        @endforeach

                            @if(session()->has("user"))
                                <li><a href="{{route('logout')}}">Logout</a></li>
                            @else
                                <li><a href="{{route('login-form')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                            @endif
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

{{--<nav class="navbar navbar-expand-lg fixed-top main-nav">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="#"><h1 class="h3">Shop</h1></a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarResponsive">--}}
{{--            <ul class="navbar-nav ml-auto nav">--}}
{{--                @foreach($menu as $link)--}}
{{--                    <li class="nav-item @if(request()->routeIs($link["route"])) active @endif">--}}
{{--                        <a class="nav-link" href="{{ route($link["route"]) }}">{{ $link["name"] }}</a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
