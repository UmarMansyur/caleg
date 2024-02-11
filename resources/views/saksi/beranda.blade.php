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
              <img src="{{ file_exists(public_path('storage/' . auth()->user()->thumbnail)) ? asset('storage/' . auth()->user()->thumbnail) : auth()->user()->thumbnail
               }}" alt="" class="rounded-circle img-thumbnail">
            </div>
          </div>
          <div class="col-md-9">
            <span class="badge bg-primary-subtle text-primary  font-size-10 text-uppercase ls-05">
              {{ auth()->user()->role }}
            </span>
            <h5 class="">{{ auth()->user()->name }}</h5>
            <p class="text-muted mt-3" style="text-transform: uppercase">{{$data->tps->kecamatan }} {{ $data->tps->kabupaten }}</p>

            <div class="row g-0 mt-3 pt-1 align-items-end">
              <div class="col-3">
                <div class="mt-1">
                  <h4 class="font-size-16">{{ $form->jumlah_suara ?? 0 }}</h4>
                  <p class="text-muted mb-1">Total Suara</p>
                </div>
              </div>
              <div class="col-3">
                <div class="mt-1">
                  <h4 class="font-size-16">{{ $form->jumlah_suara_sah ?? 0 }}</h4>
                  <p class="text-muted mb-1">Suara Sah</p>
                </div>
              </div>
              <div class="col-3">
                <div class="mt-1">
                  <h4 class="font-size-16">{{ $form->jumlah_suara_tidak_sah ?? 0 }}</h4>
                  <p class="text-muted mb-1">Suara Tidak Sah</p>
                </div>
              </div>
              <div class="col-3">
                <div class="mt-1">
                  <a href="/lapor" class="btn btn-primary w-50"><i class="bx bx-pencil"></i> Lapor</a>
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