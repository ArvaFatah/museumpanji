<!DOCTYPE html>
<html lang="id">
  @include('layouts.artmuseum.head')
  <body>
    @include('layouts.artmuseum.topbar')
    
    @yield('content')

    @include('layouts.artmuseum.footer')
    
    @include('layouts.artmuseum.script')
  </body>
</html>



