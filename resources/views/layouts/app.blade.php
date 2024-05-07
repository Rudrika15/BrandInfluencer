<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('influencerbrand/style.css') }}">
</head>


<body>

    <nav class="sidebar" style="z-index: 1">
        <header class="site-header">
            <div class="image-text">
                <span class="image">
                    <a href="{{ route('home') }}"><img src="{{ asset('images/Logo2.png') }}" alt="logo" /></a>
                </span>
                <div class="text header-text">
                    <span class="main">Brand</span>
                    <span class="sub">Beans</span>
                </div>
            </div>
            <i class="bx bx-chevron-right toggle"></i>

        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    {{-- <li class="search-bar">
                        <i class="bx bx-search icons"></i>
                        <input type="search" placeholder="Search..." />
                    </li> --}}
                    <li class="nav-linkm active">
                        <a href="{{ route('home') }}">
                            <i class="bx bx-home-alt icons"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-linkm">
                        <a href="{{ route('influencer.brands') }}">
                            <i class="bx bx-bar-chart-alt-2 icons"></i>
                            <span class="text nav-text">Brands</span>
                        </a>
                    </li>
                    <li class="nav-linkm">
                        <a href="{{ route('influencer.campaignApplyList') }}">
                            <i class="bx bx-bell icons"></i>
                            <span class="text nav-text">My Applied Campaigns</span>
                        </a>
                    </li>
                    <li class="nav-linkm">
                        <a href="{{ route('influencer.package.index') }}">
                            <i class="bx bx-pie-chart-alt icons"></i>
                            <span class="text nav-text">Packages</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="nav-linkm">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-log-out icons"></i>
                        <span class="text nav-text">Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                <li class="mode">
                    <div class="moon-sun">
                        <i class="bx bx-moon icons moon"></i>
                        <i class="bx bx-sun icons sun"></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>

    </nav>
    <nav class="nav menu-links text-white justify-content-end bg-light py-4 pe-4" style="z-index: -1">

        <ul class="nav">
            <li class="nav-item dropdown">
                <a class=" dropdown-toggle " style="color: #156b9f" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu bg-blue " aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <span class="ps-2" style="color: #156b9f;">I'm an</span>
                        <div class="btn-frame">
                            <input id="toggle-on" class="toggle toggle-left" name="toggle" value="false" type="radio" checked>
                            <label for="toggle-on" class="btn left">Influencer</label>
                            <input id="toggle-off" class="toggle toggle-right" name="toggle" value="true" type="radio">
                            <label for="toggle-off" class="btn right">Brand</label>
                        </div>

                    </li>
                    <hr>
                    <a class="header-menu-link " href="{{ route('profile') }}">
                        <li class="menu-li ms-3">Profile</li>
                    </a>
                    <hr>
                    <a class="header-menu-link " href="{{ route('user.card') }}/{{ Auth::user()->mobileno }}" target="_blank">
                        <li class="menu-li ms-3">View Social Card</li>
                    </a>
                    <hr>
                    <a class="header-menu-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <li class="menu-li ms-3">
                            Logout
                        </li>
                    </a>
                </ul>
            </li>
        </ul>

    </nav>



    <div class="container content">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('influencerbrand/script.js') }}"></script>


</body>

</html>
