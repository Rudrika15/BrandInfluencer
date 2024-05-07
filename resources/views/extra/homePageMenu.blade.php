<header>
    <div class="container navbar">
        <a href="/" title="Perfect Property" class="header-logo d-block">
            <img src="{{ asset('assetshtml/images/logo.png') }}" title="Brandbeans" height="50" />
        </a>
        <div class="nav-item">
            <nav class="d-none d-lg-block">
                <ul>
                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="#">Influencer</a></li>
                </ul>
            </nav>
            <ul>
                <li><a href="{{ route('login') }}" class="custombtn">Login</a></li>
                <li><a href="#" class="custombtn highlighbtn">Register</a></li>
            </ul>
            <div class="side-menu-close d-flex d-lg-none flex-wrap flex-column align-items-center justify-content-center ml-auto">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>
