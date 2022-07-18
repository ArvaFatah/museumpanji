@php
$user = Auth::user();
@endphp

<li class="nav-item">
  <a href="{{ Route('dashboard') }}" class="nav-link {{ Request::is('/admin/dashboard') || Request::is('admin/dashboard') ? 'active' : '' }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-header">Contents</li>
<li class="nav-item">
  <a href="{{ Route('admin.profil') }}" class="nav-link {{ Request::is('/admin/profil') || Request::is('admin/profil') ? 'active' : '' }}">
    <i class="nav-icon fas fa-landmark"></i>
    <p>
      Profile
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ Route('admin.gallery') }}" class="nav-link {{ Request::is('/admin/gallery') || Request::is('admin/gallery') ? 'active' : '' }}">
    <i class="nav-icon far fa-image"></i>
    <p>
      Gallery
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ Route('admin.virtual') }}" class="nav-link {{ Request::is('/admin/virtual') || Request::is('admin/virtual') ? 'active' : '' }}">
    <i class="nav-icon fas fa-location-arrow"></i>
    <p>
      Virtual Tour
    </p>
  </a>
</li>
<li class="nav-header">Management</li>
<li class="nav-item">
  <a href="{{ Route('admin.user') }}" class="nav-link {{ Request::is('/admin/user') || Request::is('admin/user') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user-friends"></i>
    <p>
      User
    </p>
  </a>
</li>