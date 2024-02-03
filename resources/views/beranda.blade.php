@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-md-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h6 class="font-size-15">Jumlah TPS</h6>
            <h4 class="mt-3 pt-1 mb-0 font-size-22"> {{ $jumlah_tps }} <span
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
            <h4 class="mt-3 pt-1 mb-0 font-size-22">{{ $jumlah_calon}} <span
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
            <h4 class="mt-3 pt-1 mb-0 font-size-22">{{ $saksi }} <span
                class="text-success fw-medium font-size-14 align-middle">
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
            <h4 class="mt-3 pt-1 mb-0 font-size-22">{{ $saksi_melapor }}<span
                class="text-success fw-medium font-size-14 align-middle">
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

        <div class="row justify-content-center">
          @foreach($perolehan_suara as $suara)
          <div class="col-4">
            <div class="text-center">
              <h4 class="font-size-18">{{ $suara->jumlah_suara }} Suara</h4>
              <h5 class="mb-1 text-muted font-size-14">
                {{ $suara->nama }}  
              </h5>
            </div>
          </div>
          @endforeach

          <div class="col-12">
            <div id="sales-countries" data-colors='["#1f58c7"]' class="apex-charts" dir="ltr"></div>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection