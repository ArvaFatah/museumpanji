@php
$user = Auth::user();
@endphp

<li class="nav-item">
  <a href="{{ Route('dashboard') }}" class="nav-link {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }}">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>