<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- Home -->
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="fas fa-home"></i>
        </a>
      </li>
      
      {{--  @php
          $stokBarang = \DB::select("SELECT * FROM stok_barang where tgl_exp < created_at");
      @endphp

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Barang EXP</span>
          <div class="dropdown-divider"></div>
          @foreach ($stokBarang as $stokBarang)
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>{{ $stokBarang->nama_barang }}
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          @endforeach
        </div>
      </li>  --}}

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
  </nav>
  <!-- /.navbar -->