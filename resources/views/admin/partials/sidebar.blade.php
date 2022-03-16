 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="/admin" class="brand-link">
         <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">Adi Karya</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar Menu -->
         <nav class="mt-2">

             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item menu-open mb-5">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-user"></i>
                         <p>
                             {{ Auth::user()->name }}
                             <i class=" right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                 class="d-none">
                                 @csrf
                             </form>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="/admin" class=" nav-link {{ Request::url() == url('/admin') ? 'active' : ' ' }}">
                         <i class="nav-icon fas fa-home"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/admin/carousel"
                         class="nav-link {{ Request::url() == url('/admin/carousel') ? 'active' : ' ' }}">
                         <i class="nav-icon fas fa-images"></i>
                         <p>
                             Carousel
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('product.index') }}"
                         class="nav-link {{ Request::url() == route('product.index') ? 'active' : ' ' }}">
                         <i class="nav-icon fas fa-shopping-cart"></i>
                         <p>
                             Produk
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('about.index') }}"
                         class="nav-link {{ Request::url() == route('about.index') ? 'active' : ' ' }}">
                         <i class="nav-icon fas fa-info"></i>
                         <p>
                             About
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('pemilik.index') }}"
                         class="nav-link  {{ Request::url() == route('pemilik.index') ? 'active' : ' ' }}">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Pemilik
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('testimoni.index') }}"
                         class="nav-link {{ Request::url() == route('testimoni.index') ? 'active' : ' ' }}">
                         <i class="nav-icon fas fa-comment"></i>
                         <p>
                             Testimoni
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
