@php 
// $sidebar = [
//             [
//                 'is_parent' => 0,
//                 'label' => 'Dashboard',
//                 'route' => 'dashboard',
//                 'icon' => 'nav-icon fas fa-tachometer-alt'
//             ],
//             [
//                 'is_parent' => 0,
//                 'label' => 'User',
//                 'route' => 'users',
//                 'icon' => 'nav-icon fas fa-user'
//             ],
//             [
//                 'is_parent' => 0,
//                 'label' => 'Route',
//                 'route' => 'routes/index',
//                 'icon' => 'nav-icon fa fa-route'
//             ],
//             [
//                 'is_parent' => 1,
//                 'label' => 'Email',
//                 'route' => 'dashboard',
//                 'icon' => 'nav-icon fa fa-envelope',
//                 'children' => [
//                     [
//                         'label' => 'Compose',
//                         'route' => 'dashboard1',
//                     ],
//                     [
//                         'label' => 'Inbox',
//                         'route' => 'dashboard2'
//                     ],
//                     [
//                         'label' => 'Read',
//                         'route' => 'admin-login',
//                     ]
//                 ]
//             ],
//             [
//                 'is_parent' => 1,
//                 'label' => 'Charts',
//                 'route' => 'dashboard3',
//                 'icon' => 'nav-icon fas fa-chart-pie',
//                 'children' => [
//                     [
//                         'label' => 'Flot',
//                         'route' => 'dashboard4',
//                     ],
//                     [
//                         'label' => 'Moris',
//                         'route' => 'dashboard5',
//                     ]
//                 ]
//             ]
//         ];
$sidebar = DB::table('routes')->get();
foreach ($sidebar as $key => $route) {
  if($route->is_parent == 1){
    $child_routes = DB::table('children_routes')->where('parents_id', $route->id)->get();
    $route->children = $child_routes;
  }
}
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #10263c;">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}/admin/index3.html" class="brand-link">
      <img src="{{ url('/') }}/admin/images/icon.png" alt="PropDukan Logo" style="height: 25px; width:50px;" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PropDukan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('/') }}/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @foreach ($sidebar as $s_value)
          @if($s_value->is_parent == 0)
          <li class="nav-item">
            <a href="{{ url($s_value->route) }}" class="nav-link {{ request()->routeIs($s_value->route) ? 'active' : null }}">
              <i class="{{ $s_value->icon }}"></i>
              <p>
                {{ $s_value->label }}
              </p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="{{ $s_value->icon }}"></i>
              <p>
                {{ $s_value->label }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @foreach ($s_value->children as $children)
                <li class="nav-item">
                  <a href="{{ url($children->route) }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $children->label }}</p>
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
          @endif
          @endforeach
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>