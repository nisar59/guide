@php
$pref=Request()->route()->getPrefix();
$type=Request()->type;
@endphp
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{url('/')}}"> <img alt="image" src="{{url('public/img/settings/'.Settings()->portal_logo)}}" class="header-logo" /> <span
      class="logo-name">{{Settings()->portal_name}}</span>
    </a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown @if($pref=='') active @endif">
      <a href="{{url('/')}}" class="nav-link"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Users</li>
    <li class="dropdown @if($pref=='/users' OR $pref=='/roles') active @endif">
      <a href="#" class="menu-toggle nav-link has-dropdown"><i
        class="fas fa-user-friends"></i><span>Users</span></a>
        <ul class="dropdown-menu">
          @can('users.view')
          <li class="dropdown @if($pref=='/users') active @endif">
            <a href="{{url('users')}}" class="nav-link"><i class="fas fa-user-friends"></i><span>Users</span></a>
          </li>
          @endcan
          @can('permissions.view')
          <li class="dropdown @if($pref=='/roles') active @endif"><a class="nav-link" href="{{url('roles')}}"><i class="fas fa-hands-helping"></i><span>Roles & Permissions</span></a></li>
          @endcan
        </ul>
      </li>

      @can('media.view')
      <li class="menu-header">Media</li>
      <li class="dropdown @if($pref=='/media') active @endif">
        <a href="{{url('media')}}" class="nav-link"><i class="fas fa-camera-retro"></i><span>Media</span></a>
      </li>
      @endcan

      @can('devices.view')
      <li class="menu-header">Devices & Guide</li>
      <li class="dropdown @if($pref=='/devices') active @endif">
        <a href="{{url('devices')}}" class="nav-link"><i class="fas  fa-mobile-alt"></i><span>Devices & Guide</span></a>
      </li>
      @endcan
      @can('settings.view')
      <li class="menu-header">Panel Settings</li>
      <li class="dropdown @if($pref=='/settings') active @endif">
        <a href="{{url('settings')}}" class="nav-link"><i class="fas fa-cogs"></i><span>Panel Settings</span></a>
      </li>
      @endcan
    </ul>
  </aside>
</div>