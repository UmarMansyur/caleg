@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start mb-2">
          <div class="flex-grow-1">
            <h2 class="card-title">Selamat Datang</h2>
          </div>
        </div>

        <div class="row align-items-center">
          <div class="col-md-3">
            <div class="popular-product-img p-2">
              <img src="/assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-thumbnail">
            </div>
          </div>
          <div class="col-md-9">
            <span class="badge bg-primary-subtle text-primary  font-size-10 text-uppercase ls-05"> Saksi TPS 01</span>
            <h5 class="">Umar Mansyur</h5>
            <p class="text-muted mt-3">Tlanakan, Pamekasan Madura</p>

            <div class="row g-0 mt-3 pt-1 align-items-end">
              <div class="col-3">
                <div class="mt-1">
                  <h4 class="font-size-16">800</h4>
                  <p class="text-muted mb-1">Total Suara</p>
                </div>
              </div>
              <div class="col-3">
                <div class="mt-1">
                  <h4 class="font-size-16">550</h4>
                  <p class="text-muted mb-1">Suara Sah</p>
                </div>
              </div>
              <div class="col-3">
                <div class="mt-1">
                  <h4 class="font-size-16">250</h4>
                  <p class="text-muted mb-1">Suara Tidak Sah</p>
                </div>
              </div>
              <div class="col-3">
                <div class="mt-1">
                  <a href="" class="btn btn-primary w-50"><i class="bx bx-pencil"></i> Lapor</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection