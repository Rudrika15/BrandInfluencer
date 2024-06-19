<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    {{-- bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('influencerbrand/style.css') }}">
    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .dropdown-menu {
            position: relative;
            background-color: transparent !important;
            display: flex !important;
            border: none;
        }

        .dropdown-menu>button {
            position: relative;
            z-index: 2;
            transition: 0.3s;
        }

        .dropdown-menu>button:hover {
            background: #15c6eb;
        }

        .dropdown-menu.open>button {
            /*   background: #000080; */
            background: -webkit-linear-gradient(to bottom, #1d4880, #15c6eb);
            background: linear-gradient(to bottom, #1d4880, #15c6eb);
        }

        .dropdown-menu button {
            display: flex !important;
            align-items: center;
            gap: 10px;
            padding: 0 15px;
            width: 230px;
            height: 50px;
            border-radius: 12px;
            color: #fdfefe;
            background: #1d4880;
            border: 0;
            cursor: pointer;
            font-size: 18px;
            font-family: "Cambria";
        }

        .dropdown-menu button .chevron {
            margin-left: auto;
        }

        .dropdown-menu__labels {
            position: absolute;
            overflow: hidden;
            z-index: 1;
            top: 60px;
            left: 0;
            width: 100%;
            height: 110px;
            opacity: 0;
            visibility: hidden;
            background-color: #fff;
            border-radius: 12px;
            border-top: 0;
            translate: 0 -20px;
            transition: 0.4s;
        }

        .primary-menu__labels {
            width: 230px;
        }

        .primary-menu {
            position: absolute;
            width: 460px;
            display: flex;
            transition: 0.3s;
        }

        .primary-menu.open {
            translate: -50%;
        }

        .dropdown-menu__labels button {
            border: 0;
            width: 100%;
            height: 56px;
            border-radius: 0;
        }

        .dropdown-menu__labels button:hover {
            background: #15c6eb;
        }

        .dropdown-menu.open .dropdown-menu__labels {
            opacity: 1;
            translate: 0;
            visibility: visible;
        }

        .secondary-menu__labels {
            display: none;
            width: 230px;
        }

        .secondary-menu__labels.open {
            display: block;
        }
    </style>
    @role('Admin')
        <style>
            .dropdown-menu__labels {
                height: 170px !important;
            }
        </style>
    @endrole
</head>


<body>

    <?php
    $user = Auth::user()->id;
    $balance = \App\Models\BrandPoints::where('userId', $user)->get();
    $total = 0;
    
    foreach ($balance as $points) {
        $total += $points->points;
    }
    
    ?>
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
                {{-- @if (Auth::check() && Auth::user()->roles->contains('Influencer'))
                    hi
                @else
                    hello
                @endif --}}
                @role('Influencer')
                    <ul class="menu-links" id="brand">
                        {{-- <li class="search-bar">
                        <i class="bx bx-search icons"></i>
                        <input type="search" placeholder="Search..." />
                            </li> --}}
                        <li class="nav-linkm {{ request()->routeIs('home') ? 'active' : '' }} ">
                            <a href="{{ route('home') }}" class="text-hover">
                                <i class="bx bx-home-alt icons text-blue"></i>
                                <span class="text nav-text text-blue">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-linkm {{ request()->routeIs('influencer.campaignApplyList') ? 'active' : '' }}">
                            <a href="{{ route('influencer.campaignApplyList') }}">
                                <i class="bx bx-bar-chart-alt-2 icons"></i>
                                <span class="text nav-text text-blue">My Applied Campaigns</span>
                            </a>
                        </li>
                        <li class="nav-linkm {{ request()->routeIs('influencer.notifications') ? 'active' : '' }}">
                            <a href="{{ route('influencer.notifications') }}">
                                <i class="bx bx-bell icons"></i>
                                <span class="text nav-text text-blue">Notifications</span>
                            </a>
                        </li>
                        <li class="nav-linkm {{ request()->routeIs('influencer.chat.index') ? 'active' : '' }}">
                            <a href="{{ route('influencer.chat.index') }}">
                                <i class="bx bx-message icons"></i>
                                <span class="text nav-text text-blue">Chats</span>
                            </a>
                        </li>
                        <li class="nav-linkm {{ request()->routeIs('influencer.package.index') ? 'active' : '' }}">
                            <a href="{{ route('influencer.package.index') }}">
                                <i class="bx bx-pie-chart-alt icons"></i>
                                <span class="text nav-text text-blue">Packages</span>
                            </a>
                        </li>
                        <li class="nav-linkm {{ request()->routeIs('pricing.index') ? 'active' : '' }} {{ request()->routeIs('pricing.index') ? 'active' : '' }}">
                            <a href="{{ route('pricing.index') }}">
                                <i class="bi bi-piggy-bank-fill icons"></i>
                                <span class="text nav-text text-blue">Pricing</span>
                            </a>
                        </li>

                    </ul>
                @endrole
                @role('Brand')
                    <ul class="menu-links" id="influencer">
                        {{-- brand menu --}}

                        <li class="nav-linkm {{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}">
                                <i class="bx bx-home-alt icons"></i>
                                <span class="text nav-text text-blue">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-linkm {{ request()->routeIs('brand.campaign.index') ? 'active' : '' }} ">
                            <a href="{{ route('brand.campaign.index') }}">
                                <i class="bi bi-person-workspace icons"></i>
                                <span class="text nav-text text-blue">Campaign</span>
                            </a>
                        </li>
                        {{-- <li class="nav-linkm {{ request()->routeIs('pricing.index') ? 'active' : '' }} active">
                        <a href="{{ route('brand.campaign.step.index') }}">
                            <i class="bx bx-home-alt icons"></i>
                            <span class="text nav-text text-blue">Campaign Steps</span>
                        </a>
                    </li> --}}
                        {{-- <li class="nav-linkm {{ request()->routeIs('brand.campaign.appliers') ? 'active' : '' }} ">
                        <a href="{{ route('brand.campaign.appliers') }}">
                            <i class="bi bi-person-add icons"></i>
                            <span class="text nav-text text-blue">Appliers</span>
                        </a>
                    </li> --}}
                        <li class="nav-linkm {{ request()->routeIs('influencer.notifications') ? 'active' : '' }}">
                            <a href="{{ route('influencer.notifications') }}">
                                <i class="bx bx-bell icons"></i>
                                <span class="text nav-text text-blue">Notifications </span>

                                {{-- <i class='bx bxs-circle text-success ms-5 mb-5' title="you have new notification"></i> --}}
                                {{-- @if (Auth::user()->id == App\Models\BrandInfluencerNotification::where('userId', Auth::user()->id)->get())
                                @endif --}}

                            </a>
                        </li>
                        <li class="nav-linkm {{ request()->routeIs('influencer.chat.index') ? 'active' : '' }}">
                            <a href="{{ route('influencer.chat.index') }}">
                                <i class="bx bx-message icons"></i>
                                <span class="text nav-text text-blue">Chats</span>
                            </a>
                        </li>
                        <li class="nav-linkm {{ request()->routeIs('pricing.index') ? 'active' : '' }} {{ request()->routeIs('pricing.index') ? 'active' : '' }}">
                            <a href="{{ route('pricing.index') }}">
                                <i class="bi bi-piggy-bank-fill icons"></i>
                                <span class="text nav-text text-blue">Pricing</span>
                            </a>
                        </li>

                        <li class="nav-linkm {{ request()->routeIs('brand.log') ? 'active' : '' }} ">
                            <a href="{{ route('brand.log') }}">
                                <i class="bi bi-list-nested icons"></i>
                                <span class="text nav-text text-blue">Point Log</span>
                            </a>
                        </li>
                        {{-- <li class="nav-linkm {{ request()->routeIs('pricing.index') ? 'active' : '' }} active">
                        <a href="{{ route('brand.offers') }}">
                            <i class="bx bx-home-alt icons"></i>
                            <span class="text nav-text text-blue">Brand Offers</span>
                        </a>
                    </li> --}}
                        <li class="nav-linkm ">
                            <a href="{{ route('brand.campaign.create') }}" class="btn btn-primary btn-sm rounded-pill">
                                <i class="bx bx-plus icons text-white" style="color: white !important"></i>
                                <span class="text nav-text text-center text-white h6">
                                    Create
                                    Campaign
                                </span>
                            </a>
                        </li>


                    </ul>
                @endrole
            </div>

            <div class="bottom-content">
                <li class="nav-linkm ">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-log-out icons"></i>
                        <span class="text nav-text text-blue">Log Out</span>
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
                    <span class="mode-text text-blue">Dark Mode</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>

    </nav>
    <nav class="nav menu-links text-white justify-content-end  py-4 pe-4" style="z-index: -1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <ul class="nav">
            {{-- <li class="nav-item pe-3" style="color: #156b9f;"> --}}

            <section class="dropdown-menu" id="dropdown-menu">
                <button onclick="handleDropdownClicked(event)">
                    <span class="material-symbols-outlined"> account_circle </span>
                    {{ Auth::user()->name }}
                    <span id="dropdown-icon" class="chevron material-symbols-outlined"> expand_more </span>
                </button>
                <section class="dropdown-menu__labels">
                    <div id="primary-menu" class="primary-menu">
                        <div class="primary-menu__labels">
                            @role('Admin')
                                <a href="{{ route('admin.dashboard') }}">
                                    <button>
                                        <span class="material-symbols-outlined"> admin_panel_settings </span>
                                        Admin
                                    </button>
                                </a>
                            @endrole
                            <a href="{{ route('profile') }}">
                                <button>
                                    <span class="material-symbols-outlined"> store </span>
                                    Profile
                                </button>
                            </a>

                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <button>
                                    <span class="material-symbols-outlined"> logout </span>
                                    Sign Out
                                </button>
                            </a>
                        </div>
                    </div>
                </section>
            </section>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>




            {{-- </li> --}}
            {{-- <li class="nav-item dropdown">
                <a class=" dropdown-toggle " style="color: #156b9f" href="#" id="navbarDropdownMenuLink"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="d-none">
                        <span class="ps-2" style="color: #156b9f;">I'm an</span>
                        <div class="btn-frame">
                            <input id="toggle-on" class="toggle toggle-left" name="toggle" value="false"
                                type="radio" @if (Auth::user()->roles->contains('Influencer')) checked @endif>
                            <label for="toggle-on" class="btn left">Influencer</label>
                            <input id="toggle-off" class="toggle toggle-right" name="toggle" value="true"
                                type="radio" @if (Auth::user()->roles->contains('Brand')) checked @endif>
                            <label for="toggle-off" class="btn right">Brand</label>

                        </div>

                    </li>

                    <a class="" href="{{ route('profile') }}">
                        <li class="menu-li ms-3" style="  pointer-events: none;">Profile</li>
                    </a>
                    <hr>
                    <a class=" " href="{{ route('user.card') }}/{{ Auth::user()->mobileno }}" target="_blank">
                        <li class="menu-li ms-3" style="  pointer-events: none;">View Social Card</li>
                    </a>
                    <hr>
                    <a class="" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <li class="menu-li ms-3" style="  pointer-events: none;">
                            Logout
                        </li>
                    </a>
                </ul>
            </li> --}}

        </ul>

    </nav>
    <div class="d-flex justify-content-end">

        @if (session()->has('success'))
            <div class="toast align-items-center text-white show bg-success" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-light" role="progressbar" style="width: 0%"></div>
                </div>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="toast align-items-center text-white show bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-light" role="progressbar" style="width: 0%"></div>
                </div>
            </div>
        @endif
        @if (session()->has('warning'))
            <div class="toast align-items-center text-white show bg-warning" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('warning') }}
                    </div>
                    {{-- <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button> --}}
                </div>
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" style="width: 0%"></div>
                </div>
            </div>
        @endif


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="container content">
        <div class="text-info text-end pb-2 fw-bold">Points: {{ $total }}</div>
        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('influencerbrand/script.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toasts = document.querySelectorAll('.toast');

            function startProgressBar(toast) {
                const progressBar = toast.querySelector('.progress-bar');
                if (progressBar) {
                    if (!toast.classList.contains('progress-in-progress')) {
                        const delay = parseInt(toast.getAttribute('data-bs-delay'));
                        progressBar.style.transition = `width ${delay}ms linear`;
                        progressBar.style.width = '100%';
                        toast.classList.add('progress-in-progress');

                        // Check when progress bar reaches 100% width
                        progressBar.addEventListener('transitionend', function() {
                            if (progressBar.style.width === '100%' && !toast.classList.contains(
                                    'hovered')) {
                                toast.remove();
                            }
                        });
                    }
                }
            }

            function resetProgressBar(toast) {
                const progressBar = toast.querySelector('.progress-bar');
                if (progressBar) {
                    progressBar.style.width = '0%';
                    toast.classList.remove('progress-in-progress');
                }
            }

            toasts.forEach(toast => {
                toast.addEventListener('mouseenter', function() {
                    toast.classList.add('hovered');
                    resetProgressBar(toast);
                });

                toast.addEventListener('mouseleave', function() {
                    toast.classList.remove('hovered');
                    startProgressBar(toast);
                });

                startProgressBar(toast);
            });
        });
    </script>

    <script>
        const dropdownMenu = document.getElementById("dropdown-menu");
        const handleDropdownClicked = (event) => {
            event.stopPropagation();
            toggleDropdownMenu(!dropdownMenu?.classList?.contains("open"));
        };

        const handleMenuLabelClicked = (label) => {
            if (label) {
                const menuLabels = document.getElementsByClassName(
                    "secondary-menu__labels"
                );
                for (let m of menuLabels) {
                    m.classList.remove("open");
                }
                const dropdownMenuLabels = document.getElementById(label);
                dropdownMenuLabels.classList.add("open");
            }
            const primaryMenu = document.getElementById("primary-menu");
            primaryMenu.classList.toggle("open");
        };

        const toggleDropdownMenu = () => {
            const dropdownMenu = document.getElementById("dropdown-menu");
            dropdownMenu.classList.toggle("open");
            const dropdownIcon = document.getElementById("dropdown-icon");
            dropdownIcon.innerText = dropdownMenu.classList.contains("open") ?
                "close" :
                "expand_more";
        };
    </script>


</body>

</html>
