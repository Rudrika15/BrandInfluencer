 <div class="custom-overlay"></div>
 <header>
     <div class="container navbar ">
         <a href="/" title="Perfect Property" class="header-logo d-block">
             <img src="{{ asset('assetshtml/images/logo.png') }}" title="Brandbeans" height="50" />
         </a>
         <div class="nav-item">
             <nav class="d-none d-lg-block">

             </nav>
             <ul>
                 <li><a href="{{ route('login') }}" class="custombtn">Login</a></li>
                 <li><a href="{{ route('register') }}" class="custombtn highlighbtn">Register</a></li>
             </ul>
             <div
                 class="side-menu-close d-flex d-lg-none flex-wrap flex-column align-items-center justify-content-center ml-auto">
                 <span></span>
                 <span></span>
                 <span></span>
             </div>
         </div>
     </div>
 </header>
 <div class="side-menu-wrap">
     <a href="" title="Perfect Property" class="side-menu-logo d-block p-3">
         <img src="{{ asset('assetshtml/images/logo.png') }}" title="Perfect Property" width="180" />
     </a>
     <nav class="side-menu-nav">
         <!-- auto generated side menu from top header menu -->
     </nav>
     <ul class="login_btn">
         <li><a href="{{ route('login') }}" class="custombtn">Login</a></li>
         <li><a href="{{ route('register') }}" class="custombtn highlighbtn">Register</a></li>
     </ul>
     <div class="side-menu-close d-flex flex-wrap flex-column align-items-center justify-content-center">
         <span></span>
         <span></span>
         <span></span>
     </div>
 </div>
