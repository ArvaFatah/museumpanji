@extends('layouts.adminlte3.base')

@section('title', 'Category List')

@section('head-link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content-title', 'Category List')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item"><a href="#">Category</a></li>
  <li class="breadcrumb-item active">List</li>
</ol>
@endsection

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List</h3>
        <a class="btn btn-primary btn-sm float-right" href="{{ url('category/new') }}"><i class="fa fa-plus"></i> Add New</a>
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
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($categories as $category)
          <tr>
            <td>
              <div class="icheck-primary d-inline">
                <input type="checkbox" name="{{ 'checkitem'.$category->id }}" id="{{ 'checkitem'.$category->id }}" value="{{ $category->id }}">
                <label for="{{ 'checkitem'.$category->id }}">
                </label>
              </div>
            </td>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>
              @if($category->status == 0)
                <a href="{{ url('category/status/active/'.$category->id) }}" class="btn btn-warning btn-sm">Inactive</a>
              @elseif($category->status == 1)
                <a href="{{ url('category/status/inactive/'.$category->id) }}" class="btn btn-success btn-sm">Active</a>
              @endif
            </td>
            <td>
              <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
              <button class="btn btn-default btn-sm" onClick="showDetailModal(this)" data-category="{{ $category }}"><i class="fa fa-eye"></i></button>&nbsp;&nbsp;
              <a href="{{ url('category/archive/'.$category->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
        <h4 class="modal-title">Detail Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <th width="30%">Category Name</th>
              <td width="1%">:</td>
              <td id="category_name"></td>
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
<!-- Bootstrap Switch -->
<script src="{{ asset('/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

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
            window.location.href = "{{ url('category/archive/mass') }}/"+ ids;
          }
        },
        {
          text: 'Active',
          className: 'btn-default',
          action: function ( e, dt, node, config ) {
            var ids = $("tbody input:checkbox:checked").map((index, el) => {
              return $(el).val();
            }).get().join(",");
            window.location.href = "{{ url('category/status/mass/active') }}/"+ ids;
          }
        },
        {
          text: 'Inactive',
          className: 'btn-default',
          action: function ( e, dt, node, config ) {
            var ids = $("tbody input:checkbox:checked").map((index, el) => {
              return $(el).val();
            }).get().join(",");
            window.location.href = "{{ url('category/status/mass/inactive') }}/"+ ids;
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
    var category = $(elem).data("category");
    console.log(category)
    
    $("#modal #category_name").html(category.name);
    $("#modal #status").html(
      category.status == 1 
        ? '<span class="badge badge-success">Active</span>'
        : '<span class="badge badge-warning">Inactive</span>'
    );

    $("#modal").modal('show');
  }
</script>
@endsection