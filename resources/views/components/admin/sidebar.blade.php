<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">{{auth()->user()->name}}</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li><a href="{{route('adminDashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> </i>Dashboard </a></li>
            <li><a href="{{route('admin_users')}}"> <i class="fa fa-user" aria-hidden="true"></i></i> Users </a></li>
            <li><a href="{{route('category')}}"> <i class="fa fa-group" aria-hidden="true"></i></i> Category </a></li>
            <li><a href="{{route('orders')}}"> <i class="fa fa-book" aria-hidden="true"></i> Orders </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"><i class="fa fa-bookmark" aria-hidden="true"></i> Products</a>
              <ul id="exampledropdownDropdown" class="{{--collapse--}} list-unstyled ">
                <li><a href="{{route('add_product')}}">Add product</a></li>
                <li><a href="{{route('products')}}">All products</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
            
    </ul>
  </nav>