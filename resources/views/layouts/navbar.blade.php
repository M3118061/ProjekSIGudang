<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    @if(Auth::check())
    <ul class="navbar-nav ml-auto">
      <!-- Telah Expired -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fas fa-hourglass-end"></i>
          <span class="badge badge-danger navbar-badge"><span id="notif_expired_badge">0</span></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">PERHATIAN!</span>
          <a href="{{ route('products') }}?status=1" class="dropdown-item">
            Ada <span id="notif_expired" class="font-weight-bold">0</span> produk telah expired!
          </a>
        </div>
      </li>

      <!-- Segera Expired -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="fas fa-hourglass-half"></i>
          <span class="badge badge-warning navbar-badge"><span id="notif_reminder_badge">0</span></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">PERHATIAN!</span>
          <a href="{{ route('products') }}?status=2" class="dropdown-item">
            Ada <span id="notif_reminder" class="font-weight-bold">0</span> produk akan segera expired!
          </a>
        </div>
      </li>
      @endif
      <!-- Home -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="fas fa-home"></i>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
    </ul>

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
  </nav>
  <!-- /.navbar -->