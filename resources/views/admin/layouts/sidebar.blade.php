<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin-home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#suplier" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-book"></i>
        <span>Suppliers</span>
      </a>
      <div id="suplier" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Suppliers Components:</h6>
          <a class="collapse-item" href="{{route('supplier-add')}}"> Add</a>
          <a class="collapse-item" href="{{route('supplier-list')}}"> List</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer" aria-expanded="true" aria-controls="customer">
        <i class="fas fa-fw fa-users"></i>
        <span>Customer</span>
      </a>
      <div id="customer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Customer Components:</h6>
          <a class="collapse-item" href="{{route('customer-add')}}"> Add</a>
          <a class="collapse-item" href="{{route('customer-list')}}"> List</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed"  href="#" data-toggle="collapse" data-target="#Unit" aria-expanded="true" aria-controls="Unit">
        <i class="fas fa-fw fa-users"></i>
        <span>Unit</span>
      </a>
      <div id="Unit" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Unit Components:</h6>
          <a class="collapse-item" href="{{route('unit-add')}}"> Add</a>
          <a class="collapse-item" href="{{route('unit-list')}}"> List</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed"  href="#" data-toggle="collapse" data-target="#categories" aria-expanded="true" aria-controls="categories">
        <i class="fas fa-fw fa-users"></i>
        <span>Categories</span>
      </a>
      <div id="categories" class="collapse" aria-labelledby="categories" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Category Components:</h6>
          <a class="collapse-item" href="{{route('category-add')}}"> Add</a>
          <a class="collapse-item" href="{{route('category-list')}}"> List</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed"  href="#" data-toggle="collapse" data-target="#Product" aria-expanded="true" aria-controls="Product">
        <i class="fas fa-fw fa-users"></i>
        <span>Product</span>
      </a>
      <div id="Product" class="collapse" aria-labelledby="Product" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Products Components:</h6>
          <a class="collapse-item" href="{{route('product-add')}}"> Add</a>
          <a class="collapse-item" href="{{route('product-list')}}"> List</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Custom Components:</h6>
          <a class="collapse-item" href="buttons.html">Buttons</a>
          <a class="collapse-item" href="cards.html">Cards</a>
        </div>
      </div>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Admin
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>User Satings</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Components:</h6>
            <a class="collapse-item" href="{{ route('user-list')}}">User List</a>

            @if (Auth::user()->is_admin != '1' && Auth::user()->is_admin != '0')
            <a class="collapse-item" href="{{ route('user-add')}}">Add New</a>
            @endif 
            
            <a class="collapse-item" href="cards.html">Add New test</a>
          </div>
        </div>
      </li>
  

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>