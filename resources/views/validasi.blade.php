@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">

        <div class="">
          <div class="row mb-2 justify-content-end">
            <div class="col-xl-3 col-md-12">
              <div class="pb-3 pb-xl-0">
                <form class="email-search">
                  <div class="position-relative">
                    <input type="text" class="form-control bg-light" placeholder="Cari...">
                    <span class="bx bx-search font-size-18"></span>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-nowrap align-middle mb-0">
            <thead class="align-middle">
              <tr>
                <th class="text-center" rowspan="2">No</th>
                <th rowspan="2">Nama TPS</th>
                <th colspan="3" class="text-center">Jumlah Suara</th>
                <th class="text-center" rowspan="2">Status</th>
                <th class="text-center" rowspan="2">Aksi</th>
              </tr>
              <tr>
                <th class="text-center">Sah</th>
                <th class="text-center">Tidak Sah</th>
                <th class="text-center">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">
                  1
                </td>
                <td>
                  TPS 01 - Tlanakan, Pamekasan
                  </h5>
                </td>
                <td class="text-center">
                  <p class="mb-0">
                    550

                  </p>
                </td>
                <td class="text-center">
                  <p class="mb-0">
                    250
                  </p>
                </td>
                <td class="text-center">
                  <p class="mb-0">
                    800
                  </p>
                </td>

                <td>
                  <div class="text-center">
                    <span class="badge rounded-pill bg-primary-subtle text-primary  font-size-11">Disetujui
                      Verifikator</span>
                  </div>
                </td>
                <td class="text-center">
                  <div class="d-flex justify-content-center">
                    <a href="{{ route('Detail Berkas') }}" class="btn btn-info btn-sm waves-effect waves-light me-2"><i
                        class="mdi mdi-eye-outline"></i>
                      </a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection