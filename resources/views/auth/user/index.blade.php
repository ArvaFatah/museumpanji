@extends('layouts.adminlte3.base')

@section('title', 'User')

@section('head-link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content-title', 'User')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="{{ Route('admin.user') }}">User</a></li>
</ol>
@endsection

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List</h3>
        <a class="btn btn-primary btn-sm float-right" href="{{ url('admin/user/add') }}"><i class="fa fa-plus"></i> Add New</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="1%">
                <div class="icheck-primary d-inline">
                  <input type="checkbox" name="checkall" id="checkall">
                  <label for="checkall">
                  </label>
                </div>
              </th>
              <th width="1%">No</th>
              <th>Name</th>
              <th>Username</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>
                <div class="icheck-primary d-inline">
                  <input type="checkbox" name="{{ 'checkitem'.$user->id }}" id="{{ 'checkitem'.$user->id }}" value="{{ $user->id }}">
                  <label for="{{ 'checkitem'.$user->id }}">
                  </label>
                </div>
              </td>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>
                <a href="{{ url('admin/user/edit/'.$user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                <button class="btn btn-default btn-sm" onClick="showDetailModal(this)" data-user="{{ $user }}"><i class="fa fa-eye"></i></button>&nbsp;&nbsp;
                <a href="{{ url('admin/user/delete/'.$user->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>

<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Pengemudi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th width="30%">Name</th>
              <td width="1%">:</td>
              <td id="user_name"></td>
            </tr>
            <tr>
              <th width="30%">Username</th>
              <td width="1%">:</td>
              <td id="user_username"></td>
            </tr>
            <tr>
              <th>Status</th>
              <td width="1%">:</td>
              <td id="status"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": [
        {
          text: '<i class="fa fa-trash"></i>',
          className: 'btn-default',
          action: function ( e, dt, node, config ) {
            var ids = $("tbody input:checkbox:checked").map((index, el) => {
              return $(el).val();
            }).get().join(",");
            window.location.href = "{{ url('master/users/delete') }}/"+ ids;
          }
        }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#checkall").click(function(){
      $("tbody input:checkbox").prop('checked', this.checked);
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
  });

  function showDetailModal(elem){
    var user = $(elem).data("user");
    
    $("#modal #user_name").html(user.name);
    $("#modal #user_username").html(user.username);
    $("#modal #status").html(
      user.status == 1 
        ? '<span class="badge badge-success">Active</span>'
        : '<span class="badge badge-warning">Inactive</span>'
    );

    $("#modal").modal('show');
  }

</script>
@endsection