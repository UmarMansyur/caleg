<header id="page-topbar" class="isvertical-topbar">
  <div class="navbar-header">
    <div class="d-flex">
      <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
      </button>

      <div class="page-title-box align-self-center d-none d-md-block">
        <h4 class="page-title mb-0">
          {{ Request::is('/') ? 'Dashboard' : '' }}
          {{ Request::is('tps') ? 'Tempat Pemungutan Suara' : '' }}
          {{ Request::is('calon') ? 'Calon Legislatif' : '' }}
          {{ Request::is('saksi') ? 'Saksi' : '' }}
          {{ Request::is('pemilihan') ? 'Pemilihan' : '' }}
          {{ Request::is('hasil') ? 'Hasil' : '' }}
          {{ Request::is('user') ? 'User' : '' }}
          {{ Request::is('lapor') ? 'Lapor' : '' }}
        </h4>
      </div>
      <!-- end page title -->

    </div>

    <div class="d-flex">
      <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item user text-start d-flex align-items-center"
          id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle header-profile-user" src="{{ file_exists(storage_path('app/public/' . Auth::user()->thumbnail)) ? asset('storage/' . Auth::user()->thumbnail) :  Auth::user()->thumbnail }}"
          alt="Header Avatar">
          <span class="d-none d-xl-inline-block ms-2 fw-medium font-size-15">{{ Auth::user()->name }}</span>
        </button>
        <div class="dropdown-menu dropdown-menu-end pt-0">
          <div class="p-3 border-bottom">
            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
            <p class="mb-0 font-size-11 text-muted">{{ Auth::user()->email }} </p>
          </div>
          <a class="dropdown-item" href="{{ route('logout') }}"><i
              class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
              class="align-middle">Logout</span></a>
        </div>
      </div>
    </div>
  </div>
</header>