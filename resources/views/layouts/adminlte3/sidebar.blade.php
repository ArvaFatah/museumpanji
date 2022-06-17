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

<li class="nav-item">
  <a href="{{ Route('admin-gallery') }}" class="nav-link {{ Request::is('/admin/gallery') || Request::is('admin/gallery') ? 'active' : '' }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Gallery
    </p>
  </a>
</li>