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
                <ul class="menu-links" id="brand" @if (session('role') === 'influencer') style="display: block;" @else style="display: none;" @endif>
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
                        <a href="{{ route('influencer.campaignApplyList') }}">
                            <i class="bx bx-bar-chart-alt-2 icons"></i>
                            <span class="text nav-text">My Applied Campaigns</span>
                        </a>
                    </li>
                    <li class="nav-linkm">
                        <a href="">
                            <i class="bx bx-bell icons"></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-linkm">
                        <a href="{{ route('influencer.chat.index') }}">
                            <i class="bx bx-message icons"></i>
                            <span class="text nav-text">Chats</span>
                        </a>
                    </li>
                    <li class="nav-linkm">
                        <a href="{{ route('influencer.package.index') }}">
                            <i class="bx bx-pie-chart-alt icons"></i>
                            <span class="text nav-text">Packages</span>
                        </a>
                    </li>

                </ul>
                <ul class="menu-links" id="influencer" @if (session('role') === 'brand') style="display: block;" @else style="display: none;" @endif>
                    {{-- brand menu --}}
                    <li class="nav-linkm active">
                        <a href="{{ route('home') }}">
                            <i class="bx bx-home-alt icons"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-linkm active">
                        <a href="{{ route('brand.campaign.index') }}">
                            <i class="bi bi-person-workspace icons"></i>
                            <span class="text nav-text">Campaign</span>
                        </a>
                    </li>
                    {{-- <li class="nav-linkm active">
                        <a href="{{ route('brand.campaign.step.index') }}">
                            <i class="bx bx-home-alt icons"></i>
                            <span class="text nav-text">Campaign Steps</span>
                        </a>
                    </li> --}}
                    <li class="nav-linkm active">
                        <a href="{{ route('brand.campaign.appliers') }}">
                            <i class="bi bi-person-add icons"></i>
                            <span class="text nav-text">Appliers</span>
                        </a>
                    </li>
                    <li class="nav-linkm">
                        <a href="">
                            <i class="bx bx-bell icons"></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-linkm">
                        <a href="{{ route('influencer.chat.index') }}">
                            <i class="bx bx-message icons"></i>
                            <span class="text nav-text">Chats</span>
                        </a>
                    </li>
                    <li class="nav-linkm active">
                        <a href="{{ route('pricing.index') }}">
                            <i class="bi bi-piggy-bank-fill icons"></i>
                            <span class="text nav-text">Pricing</span>
                        </a>
                    </li>

                    <li class="nav-linkm active">
                        <a href="{{ route('brand.log') }}">
                            <i class="bi bi-list-nested icons"></i>
                            <span class="text nav-text">Point Log</span>
                        </a>
                    </li>
                    {{-- <li class="nav-linkm active">
                        <a href="{{ route('brand.offers') }}">
                            <i class="bx bx-home-alt icons"></i>
                            <span class="text nav-text">Brand Offers</span>
                        </a>
                    </li> --}}
                    <li class="nav-linkm active">
                        <a href="{{ route('brand.campaign.create') }}" class="btn btn-primary btn-sm rounded-pill">
                            <i class="bx bx-plus icons text-white"></i>
                            <span class="text nav-text text-center text-white h6">
                                Create
                                Campaign
                            </span>
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
            <li class="nav-item pe-3" style="color: #156b9f;"> </li>
            <li class="nav-item dropdown">
                <a class=" dropdown-toggle " style="color: #156b9f" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu bg-blue " aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <span class="ps-2" style="color: #156b9f;">I'm an</span>
                        <div class="btn-frame">
                            <input id="toggle-on" class="toggle toggle-left" name="toggle" value="false" type="radio" @if (session('role') === 'influencer') checked @endif>
                            <label for="toggle-on" class="btn left">Influencer</label>
                            <input id="toggle-off" class="toggle toggle-right" name="toggle" value="true" type="radio" @if (session('role') === 'brand') checked @endif>
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
        <div class="text-info text-end pb-2 fw-bold">Points: {{ $total }}</div>
        @yield('content')
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('influencerbrand/script.js') }}"></script>

    <script>
        // JavaScript code to handle the toggle buttons and AJAX request
        $(document).ready(function() {
            console.log('jQuery is ready!');
            const toggleOn = $('#toggle-on');
            const toggleOff = $('#toggle-off');
            const roleName = $('#role-name');

            console.log(toggleOn, toggleOff, roleName);
            toggleOn.on('click', function() {
                roleName.text('I am an Influencer');
                updateSession('influencer');
                console.log('influencer');
            });

            toggleOff.on('click', function() {
                roleName.text('I am a Brand');
                updateSession('brand');
                console.log('brand');
            });

            function updateSession(role) {
                $.ajax({
                    url: "{{ route('update.session') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        role: role
                    },
                    success: function(response) {
                        console.log('Session updated successfully.');
                        window.location.href = "{{ route('home') }}";
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating session:', error);
                    }
                });
            }
        });
    </script>

</body>

</html>
