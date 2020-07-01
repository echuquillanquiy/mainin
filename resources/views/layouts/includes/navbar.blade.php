      <!-- top navbar-->
      <header class="topnavbar-wrapper">
        <!-- START Top Navbar-->
        <nav class="navbar topnavbar bg-warning">
           <!-- START navbar header-->
           <div class="navbar-header"><a class="navbar-brand" href="/">
                 <div class="brand-logo text-white">{{ config('app.name') }}</div>
                 <div class="brand-logo-collapsed"><img class="img-fluid" src="{{ asset('img/icon.png') }}" alt="App Logo"></div>
              </a></div><!-- END navbar header-->
           <!-- START Left navbar-->
           <ul class="navbar-nav mr-auto flex-row">
              <li class="nav-item">
                 <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-bars"></em></a><!-- Button to show/hide the sidebar on mobile. Visible on mobile only.--><a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-bars"></em></a>
               </li><!-- START User avatar toggle-->
              <li class="nav-item d-none d-md-block">
                 <a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse"><em class="icon-user"></em></a>
               </li><!-- END User avatar toggle-->
              <!-- START lock screen-->
              <li class="nav-item d-none d-md-block">
                 <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" title="Lock screen">
                               <em class="icon-lock"></em>
                 </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </li><!-- END lock screen-->
           </ul><!-- END Left navbar-->
           <!-- START Right Navbar-->
           <ul class="navbar-nav flex-row">
              <!-- Search icon-->
              <li class="nav-item d-none d-md-block"><a class="nav-link" href="#" data-toggle-fullscreen=""><em class="fas fa-expand"></em></a></li><!-- START Alert menu-->
              </li>
           </ul><!-- END Right Navbar-->
           <!-- START Search form-->
           <form class="navbar-form" role="search" action="search.html">
              <div class="form-group"><input class="form-control" type="text" placeholder="Type and hit enter ...">
                 <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
              </div><button class="d-none" type="submit">Submit</button>
           </form><!-- END Search form-->
        </nav><!-- END Top Navbar-->
     </header><!-- sidebar-->