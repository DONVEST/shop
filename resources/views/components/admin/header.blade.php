<header class="header">   
    <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          
          <div class="close-btn">Close <i class="fa fa-close"></i></div>

          <form method="GET" action="{{route('search_product')}}">
            @csrf
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit" onclick="notify()">Search</button>
            </div>
          </form>

        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="index.html" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">ADMIN</strong><strong>PANEL</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">A</strong><strong>P</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
        <div class="right-menu list-inline no-margin-bottom">    
          <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>
          <div class="list-inline-item dropdown"><a id="navbarDropdownMenuLink1" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle"><i class="icon-email"></i><span class="badge dashbg-1">5</span></a>
            <div aria-labelledby="navbarDropdownMenuLink1" class="dropdown-menu messages"><a href="#" class="dropdown-item message d-flex align-items-center">
                <div class="profile"><img src="{{asset('img/avatar-3.jpg')}}" alt="..." class="img-fluid">
                  <div class="status online"></div>
                </div>
                <div class="content">   <strong class="d-block">Nadia Halsey</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">9:30am</small></div></a><a href="#" class="dropdown-item message d-flex align-items-center">
                <div class="profile"><img src="{{asset('img/avatar-2.jpg')}}" alt="..." class="img-fluid">
                  <div class="status away"></div>
                </div>
                <div class="content">   <strong class="d-block">Peter Ramsy</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">7:40am</small></div></a><a href="#" class="dropdown-item message d-flex align-items-center">
                <div class="profile"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                  <div class="status busy"></div>
                </div>
                <div class="content">   <strong class="d-block">Sam Kaheil</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">6:55am</small></div></a><a href="#" class="dropdown-item message d-flex align-items-center">
                <div class="profile"><img src="img/avatar-5.jpg" alt="..." class="img-fluid">
                  <div class="status offline"></div>
                </div>
                <div class="content">   <strong class="d-block">Sara Wood</strong><span class="d-block">lorem ipsum dolor sit amit</span><small class="date d-block">10:30pm</small></div></a><a href="#" class="dropdown-item text-center message"> <strong>See All Messages <i class="fa fa-angle-right"></i></strong></a></div>
          </div>
          
          <!-- Log out               -->
          
          <div class="list-inline-item logout">
            <form method="POST" action="{{ route('logout') }}">
            @csrf

            <input type="submit" value="Logout"> <i class="fa fa-power-off" aria-hidden="true"></i>
        </form></div>
        </div>
      </div>
    </nav>
  </header>

  