<header id="header" class="p-0">
  <div class="container py-3">
    <div class="row align-items-center justify-content-between d-flex">
      <div id="logo">
        <a href="{{url('')}}"><img src="{{asset('assets/image/logo.png')}}" width="250" alt="" title="" /></a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="{{url('')}}">Home</a> | </li>
          <li class="menu-has-children"><a href="{{url('beranda')}}">Beranda</a>
				            <ul>
				              <li><a href="{{url('sejarah')}}">History</a></li>
				              <li><a href="{{url('organisasi')}}">Organisasi</a></li>
				              <li><a href="{{url('visi')}}">Visi & Misi</a></li>
                    </ul>
          <li><a href="{{url('gallery')}}">Gallery</a></li>
          <li><a href="{{url('virtual-tour')}}">Virtual Tour</a></li>
          <li><a href="{{url('info')}}">Tentang Kami</a></li>
          <li><a href="{{url('profil')}}">Hubungi Kami</a></li>
        
      </nav><!-- #nav-menu-container -->		    		
    </div>
  </div>
</header><!-- #header -->