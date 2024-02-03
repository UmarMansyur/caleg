<div data-simplebar class="sidebar-menu-scroll">

  <!--- Sidemenu -->
  <div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
      <li class="menu-title" data-key="t-menu">Beranda</li>
      <li>
        <a href="/">
          <i class="bx bx-home icon nav-icon"></i>
          <span class="menu-item" data-key="t-todo">Beranda</span>
        </a>
      </li>
      <li class="menu-title" data-key="t-menu">Aplikasi</li>
      @if(auth()->user()->role == 'admin')
      <li>
        <a href="/tps">
          <i class="bx bx-station icon nav-icon"></i>
          <span class="menu-item" data-key="t-todo">TPS</span>
        </a>
      </li>
      <li>
        <a href="/calon">
          <i class="bx bx-award icon nav-icon"></i>
          <span class="menu-item" data-key="t-todo">Calon Legislatif</span>
        </a>
      </li>
      <li>
        <a href="/saksi">
          <i class="bx bx-group icon nav-icon"></i>
          <span class="menu-item" data-key="t-todo">Saksi</span>
        </a>
      </li>
      @endif
      @if(auth()->user()->role == 'saksi')
      <li>
        <a href="/lapor">
          <i class="bx bx-file icon nav-icon"></i>
          <span class="menu-item" data-key="t-todo">Lapor Form C1</span>
        </a>
      </li>
      @endif
      @if(auth()->user()->role == 'verifikator' || auth()->user()->role == 'admin')
      <li>
        <a href="javascript: void(0);" class="has-arrow mm-collapsed" aria-expanded="false">
          <i class="bx bx-check-square icon nav-icon"></i>
          <span class="menu-item" data-key="t-todo">Verifikasi</span>
        </a>
        <ul class="sub-menu mm-collapse" aria-expanded="false" style="">
          <li><a href="{{ route('Menunggu Persetujuan') }}" data-key="t-products">Menunggu Persetujuan</a></li>
          <li><a href="{{ route('Disetujui') }}" data-key="t-products">Disetujui</a></li>
          <li><a href="{{ route('Revisi') }}" data-key="t-products">Revisi</a></li>
        </ul>
      </li>
      @endif
    </ul>
  </div>
  <!-- Sidebar -->
</div>