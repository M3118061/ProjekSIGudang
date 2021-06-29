<div class="row">
  @if (auth()->user()->role == 'admin')
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Data Pegawai</span>
        <span class="info-box-number">
          {{ \App\Models\Pegawai::count() }}
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  @endif
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Data Barang</span>
        <span class="info-box-number">{{ \App\Models\DataBarang::count() }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-database"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Data Jenis</span>
        <span class="info-box-number">{{ \App\Models\JenisBarang::count() }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Data Supplier</span>
        <span class="info-box-number">{{ \App\Models\Supplier::count() }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hourglass-end"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Barang Telah Expired</span>
        <span class="info-box-number">{{ $expired }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hourglass-half"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Barang Segera Expired</span>
        <span class="info-box-number">{{ $reminder }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@if(Auth::check())
    <script>
      $(function () {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          expiredNotif();
          setInterval(expiredNotif, 10000);
      });
      function expiredNotif(){
          $.ajax({
              url: "{{ route('products.expiryCheck') }}",
              type: "GET",
              data: {"format": "json"},
              dataType: "json",
              success:function(data) {
                  $('#notif_expired_badge').text(data.count);
                  $('#notif_expired').text(data.count);
              }
          });
          $.ajax({
              url: "{{ route('products.expiryCheck') }}",
              type: "GET",
              data: {"format": "json", "interval":true},
              dataType: "json",
              success:function(data) {
                  $('#notif_reminder_badge').text(data.count);
                  $('#notif_reminder').text(data.count);
              }
          });
      }
    </script>
    @endif
{{--  <!-- chart stok barang -->
<div id="chartStok">

</div>
<!-- end chart -->  --}}

{{--  @section('footer')
  <script src="https://code.highcharts.com/highcharts.js"></script>

  <script>
    Highcharts.chart('chartStok', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Grafik Penjualan'
      },
      xAxis: {
          categories: {!! json_encode($categories) !!},
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Jumlah Terjual'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
              '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
          name: 'Jenis Barang',
          data: [49.9]
  
      }]
  });
  </script>
@endsection  --}}