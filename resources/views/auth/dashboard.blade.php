@extends('layouts.adminlte3.base')

@section('title', 'Dashboard')

@section('content-title', 'Dashboard')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
  <li class="breadcrumb-item active">Dashboard</li>
</ol>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$totalgallery}}</h3>

        <p>Gallery</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$totalvirtual}}</h3>

        <p>Virtual Tour</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-6 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{$totaluser}}</h3>

        <p>User</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->

<!-- <div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-pie mr-1"></i>
          Chart
        </h3>
      </div>
      <div class="card-body">
        <div class="tab-content p-0">
          <div class="chart tab-pane active" id="revenue-chart"
                style="position: relative; height: 300px;">
            <canvas id="revenue-chart-canvas" data-chart="" height="300" style="height: 300px;"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
@endsection

@section('script')
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script>
  /* Chart.js Charts */
  // Sales chart
  var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d')
  // $('#revenue-chart').get(0).getContext('2d');

  var arrchart = $("#revenue-chart-canvas").data("chart");

  var salesChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Desember'],
    datasets: [
      {
        label: 'Digital Goods',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: arrchart
      }
    ]
  }

  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, { // lgtm[js/unused-local-variable]
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  })

</script>
@endsection