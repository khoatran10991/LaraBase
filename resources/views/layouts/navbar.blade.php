<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo '#';?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa fa-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{  __('layout.app') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fa fa-fw fa-tachometer-alt"></i>
            <span>{{ __('layout.dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('layout.setting') }}
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ activeClass(route('user.index'))  }}">
        <a class="nav-link collapsed" href="{{  route('user.index') }}">
            <i class="fa fa-fw fa-users"></i>
            <span>{{ __('layout.user') }}</span>
        </a>
    </li>
    <li class="nav-item {{ activeClass('#')  }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermissions" aria-expanded="true"
           aria-controls="collapsePermissions">
            <i class="fas fa-fw fa-dungeon"></i>
            <span>{{ __('layout.authorize') }}</span>
        </a>
        <div id="collapsePermissions" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#"><i class="fa fa-fw fa-plus-circle"></i> {{ __('layout.role') }}</a>
                <a class="collapse-item" href="#"><i class="fa fa-fw fa-toggle-on"></i> {{ __('layout.permission') }}</a>
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