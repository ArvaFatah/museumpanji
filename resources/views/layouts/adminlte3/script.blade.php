<!-- jQuery -->
<script src="{{ asset('/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/assets/dist/js/demo.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('/assets/plugins/toastr/toastr.min.js') }}"></script>
<script>
  $(function() {
    @if(session('errors'))
        @foreach ($errors->all() as $error)
          toastr.error("{{ $error }}")
        @endforeach
    @endif

    @if(Session::has('info'))
      toastr.info("{{ Session::get('info') }}")
    @endif
    @if(Session::has('warning'))
      toastr.warning("{{ Session::get('warning') }}")
    @endif
    @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
    @endif
    @if(Session::has('error'))
      toastr.error("{{ Session::get('error') }}")
    @endif
  });
</script>

@yield('script')