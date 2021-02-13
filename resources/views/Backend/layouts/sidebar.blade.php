@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('Backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Zonaid</span>
    </a>


<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ (!empty(Auth::user()->image))?url('upload/user_images/'.Auth::user()->image):url('upload/noImage.jpg') }}" class="img-circle elevation-3" alt="tutul">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
            @if (Auth::user()->usertype=='Admin')
                <li class="nav-item has-treeview {{ ($prefix=='/users')?'menu-open' : '' }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Users
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('users.view') }}" class="nav-link {{ ($route=='users.view')?'active': '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Users</p>
              </a>
            </li>
          </ul>
        </li>
            @endif

        <li class="nav-item has-treeview {{ ($prefix=='/profiles')?'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('profiles.view') }}" class="nav-link {{ ($route=='profiles.view')?'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Your Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('password.edit') }}" class="nav-link {{ ($route=='password.edit')?'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix=='/logo')?'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Logo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('logo.view') }}" class="nav-link {{ ($route=='logo.view')?'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Logo</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ ($prefix=='/slider')?'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('slider.view') }}" class="nav-link {{ ($route=='slider.view')?'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Slider</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix=='/contact')?'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Contact
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('contact.view') }}" class="nav-link {{ ($route=='contact.view')?'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Contact</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('communicate.view') }}" class="nav-link {{ ($route=='communicate.view')?'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Communicate</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix=='/about_us')?'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage AboutUs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('about_us.view') }}" class="nav-link {{ ($route=='about_us.view')?'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View AboutUs</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix=='/category')?'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.view') }}" class="nav-link {{ ($route=='category.view')?'active': '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>
          </ul>
    </nav>

  </div>
</aside>
