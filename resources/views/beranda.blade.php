@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h6 class="font-size-15">Jumlah TPS</h6>
            <h4 class="mt-3 pt-1 mb-0 font-size-22">25 <span
                class="text-success fw-medium font-size-14 align-middle"></span> </h4>
          </div>
          <div class="">
            <div class="avatar">
              <div class="avatar-title rounded bg-primary-subtle ">
                <i class="bx bx-station font-size-24 mb-0 text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h6 class="font-size-15">Jumlah Calon Legislatif</h6>
            <h4 class="mt-3 pt-1 mb-0 font-size-22">25 <span
                class="text-success fw-medium font-size-14 align-middle"></span> </h4>
          </div>
          <div class="">
            <div class="avatar">
              <div class="avatar-title rounded bg-primary-subtle ">
                <i class="bx bx-award font-size-24 mb-0 text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h6 class="font-size-15">Jumlah Saksi</h6>
            <h4 class="mt-3 pt-1 mb-0 font-size-22">86 <span class="text-success fw-medium font-size-14 align-middle">
              </span> </h4>
          </div>
          <div class="">
            <div class="avatar">
              <div class="avatar-title rounded bg-primary-subtle ">
                <i class="bx bx-group font-size-24 mb-0 text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h6 class="font-size-15">Jumlah Saksi Melapor</h6>
            <h4 class="mt-3 pt-1 mb-0 font-size-22">12<span class="text-success fw-medium font-size-14 align-middle">
              </span> </h4>
          </div>
          <div class="">
            <div class="avatar">
              <div class="avatar-title rounded bg-primary-subtle ">
                <i class="bx bx-file font-size-24 mb-0 text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start mb-3">
          <div class="flex-grow-1">
            <h5 class="card-title">Grafik Perhitungan Suara</h5>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <div class="text-center">
              <h4 class="font-size-18">700 Suara</h4>
              <h5 class="mb-1 text-muted font-size-14">Hamim Susilo - 01</h5>
            </div>
          </div>

          <div class="col-4">
            <div class="text-center">
              <h4 class="font-size-18">670 Suara</h4>
              <h5 class="mb-1 text-muted font-size-14">Adi Kusuma Darmawan - 02</h5>

            </div>
          </div>

          <div class="col-4">
            <div class="text-center">
              <h4 class="font-size-18">Yusuf Hanafi</h4>
              <h5 class="mb-1 text-muted font-size-14">Yusuf Hanafi - 04</h5>

            </div>
          </div>
          <div class="col-12">
            <div id="sales-countries" data-colors='["#1f58c7"]' class="apex-charts" dir="ltr"></div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xxl-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-wrap align-items-center mb-3">
          <h5 class="card-title me-2">Histori Saksi Melapor</h5>
        </div>

        <div class="mx-n4 simplebar-scrollable-y simplebar-mouse-entered" data-simplebar="init"
          style="max-height: 332px;">
          <div class="simplebar-wrapper" style="margin: 0px;">
            <div class="simplebar-height-auto-observer-wrapper">
              <div class="simplebar-height-auto-observer"></div>
            </div>
            <div class="simplebar-mask">
              <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                  style="height: auto; overflow: hidden scroll;">
                  <div class="simplebar-content" style="padding: 0px;">
                    <div class="table-responsive">
                      <table class="table table-striped table-centered align-middle table-nowrap mb-0 table-check">
                        <thead>
                          <tr>
                            <th>Waktu Melapor</th>
                            <th>Nama Saksi</th>
                            <th>Kecamatan</th>
                            <th>Kota</th>
                            <th>TPS</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="fw-semibold">15 Februari 2024</td>
                            <td>
                              <div class="d-flex align-items-center">
                                <img class="rounded-circle avatar-sm" src="assets/images/users/avatar-1.jpg" alt="">
                                <div class="flex-grow-1 ms-3">
                                  Umar Mansyur
                                </div>
                              </div>
                            </td>
                            <td>
                              Tlanakan
                            </td>
                            <td>
                              Pamekasan
                            </td>
                            <td>
                              TPS 01
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="simplebar-placeholder" style="width: 876px; height: 410px;"></div>
          </div>
          <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
            <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
          </div>
          <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
            <div class="simplebar-scrollbar"
              style="height: 268px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


@endsection