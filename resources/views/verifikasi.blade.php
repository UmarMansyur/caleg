@extends('layouts.main')
@section('content')
<div class="d-xl-flex">
  <div class="w-100">
    <div class="d-xl-flex">
      <div class="card filemanager-sidebar me-md-3">
        <div class="card-body">
          <div class="d-flex flex-column h-100">
            <div class="mb-4">
              <div class="mb-3">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Daftar Berkas
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i class="bx bx-folder me-1"></i> Folder</a>
                    <a class="dropdown-item" href="#"><i class="bx bx-file me-1"></i> File</a>
                  </div>
                </div>
              </div>
              <ul class="list-unstyled categories-list">
                <li>
                  <div class="custom-accordion">
                    <a class="text-body fw-medium py-1 d-flex align-items-center" data-bs-toggle="collapse"
                      href="#categories-collapse" role="button" aria-expanded="false"
                      aria-controls="categories-collapse">
                      <i class="mdi mdi-folder font-size-20 text-warning me-2"></i> Berkas Form C1 <i
                        class="mdi mdi-chevron-up accor-down-icon ms-auto"></i>
                    </a>
                    <div class="collapse show" id="categories-collapse">
                      <div class="card border-0 shadow-none ps-2 mb-0">
                        <ul class="list-unstyled mb-0">
                          <li><a href="#" class="d-flex align-items-center"><span class="me-auto">Menunggu
                                Persetujuan</span></a></li>
                          <li><a href="#" class="d-flex align-items-center"><span class="me-auto">Disetui</span></a>
                          </li>
                          <li><a href="#" class="d-flex align-items-center"><span class="me-auto">Revisi</span></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- filemanager-leftsidebar -->

      <div class="w-100">
        <div class="card">
          <div class="card-body">
            <h5 class="font-size-16 me-3 mb-0">Berkas Form C1</h5>
            <div class="row mt-4">
              <div class="col-xl-4 col-sm-6">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <i class="bx bxs-folder h2 mb-0 text-warning"></i>
                        </div>
                        <div class="avatar-group">
                          <div class="avatar-group-item">
                            <a href="javascript: void(0);" class="d-inline-block">
                              <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle avatar-sm">
                            </a>
                          </div>
                          <div class="avatar-group-item">
                            <a href="javascript: void(0);" class="d-inline-block">
                              <div class="avatar-sm">
                                <span class="avatar-title rounded-circle bg-success text-white font-size-16">
                                  A
                                </span>
                              </div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex mt-3">
                        <div class="overflow-hidden me-auto">
                          <h5 class="font-size-15 text-truncate mb-1"><a href="javascript: void(0);"
                              class="text-body">Menunggu Persetujuan</a></h5>
                          <p class="text-muted text-truncate mb-0">12 Files</p>
                        </div>
                        <div class="align-self-end ms-2">
                          <p class="text-muted mb-0 font-size-13"><i class="bx bx-time-five align-middle me-1"></i> 15
                            min ago</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end col -->

              <div class="col-xl-4 col-sm-6">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <i class="bx bxs-folder h2 mb-0 text-warning"></i>
                        </div>
                        <div class="avatar-group">
                          <div class="avatar-group-item">
                            <a href="javascript: void(0);" class="d-inline-block">
                              <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-sm">
                            </a>
                          </div>
                          <div class="avatar-group-item">
                            <a href="javascript: void(0);" class="d-inline-block">
                              <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-sm">
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex mt-3">
                        <div class="overflow-hidden me-auto">
                          <h5 class="font-size-15 text-truncate mb-1"><a href="javascript: void(0);"
                              class="text-body">Disetujui</a></h5>
                          <p class="text-muted text-truncate mb-0">235 Files</p>
                        </div>
                        <div class="align-self-end ms-2">
                          <p class="text-muted mb-0 font-size-13"><i class="bx bx-time-five align-middle me-1"></i> 23
                            min ago</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6">
                <div class="card">
                  <div class="card-body p-3">
                    <div class="">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <i class="bx bxs-folder h2 mb-0 text-warning"></i>
                        </div>
                        <div class="avatar-group">
                          <div class="avatar-group-item">
                            <a href="javascript: void(0);" class="d-inline-block">
                              <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-sm">
                            </a>
                          </div>
                          <div class="avatar-group-item">
                            <a href="javascript: void(0);" class="d-inline-block">
                              <img src="assets/images/users/avatar-6.jpg" alt="" class="rounded-circle avatar-sm">
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex mt-3">
                        <div class="overflow-hidden me-auto">
                          <h5 class="font-size-15 text-truncate mb-1"><a href="javascript: void(0);"
                              class="text-body">Revisi</a></h5>
                          <p class="text-muted text-truncate mb-0">235 Files</p>
                        </div>
                        <div class="align-self-end ms-2">
                          <p class="text-muted mb-0 font-size-13"><i class="bx bx-time-five align-middle me-1"></i> 23
                            min ago</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- end card -->
      </div>
      <!-- end w-100 -->
    </div>
  </div>
</div>
@endsection