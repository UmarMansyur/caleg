@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-xxl-12">
    <div class="card">
      <div class="card-body">
        <!-- Nav tabs -->
        <ul class="nav nav-pills nav-justified" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab" aria-selected="true">
              <span>Perolehan Suara Calon</span>
            </a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" data-bs-toggle="tab" href="#post" role="tab" aria-selected="false" tabindex="-1">
              <span>Verifikasi</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Tab content -->
    <div class="tab-content">
      <div class="tab-pane active" id="overview" role="tabpanel">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <h5 class="font-size-16">Perolehan Suara Calon - (TPS 01)</h5>
                <h4 class="font-size-15 mb-3 mt-2">Tlanakan Pamekasan</h4>
              </div>
              <div class="col-6">
                <div class="text-end">
                  <span class="badge bg-info">Menunggu Konfirmasi</span>
                </div>
              </div>
            </div>
            <div class="mt-4">
              <h5 class="font-size-15">Rekap Perolehan Suara: </h5>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> 800 Total Suara
              </p>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> 250 Suara Tidak Sah
              </p>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> 550 Suara Sah
              </p>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> 250 Suara Partai
              </p>

              <h5 class="font-size-15 mt-4">Saksi :</h5>
              <div class="row">
                <div class="col-6">
                  Nama Saksi: Umar Mansyur
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-success"><i class="bx bx-download"></i> Download File C1</button>
                </div>
              </div>
            </div>

            <div class="mt-4">
              <h5 class="font-size-16 mb-4">Rincian Perolehan Suara Masing-Masing Calon: </h5>
              <div class="table-responsive">
                <table class="table table-hover mb-1">
                  <thead class="bg-light">
                    <tr>
                      <th scope="col" class="text-center">Nomor Urut</th>
                      <th scope="col">Nama Calon</th>
                      <th scope="col">Jumlah Suara</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">
                        01
                      </td>
                      <td>
                        <h5 class="font-size-14 mb-1">Marzuki Alie</h5>
                      </td>
                      <td>
                        250
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">
                        02
                      </td>
                      <td>
                        <h5 class="font-size-14 mb-1">Abdullah Rizky</h5>
                      </td>
                      <td>
                        450
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="messages" role="tabpanel">
        <div class="card">
          <div class="card-body">
            <h5 class="font-size-16 mb-3">Perolehan Suara Partai - (TPS 01)</h5>
            <div class="mt-3">
              <p class="font-size-15 mb-1">Tlanakan Pamekasan</p>

              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> 800 Total Suara
              </p>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> 250 Suara Tidak Sah
              </p>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> 550 Suara Sah
              </p>

              <h5 class="font-size-15">Saksi :</h5>
              <div class="row">
                <div class="col-6">
                  Nama Saksi : Muhammad Fauzan
                </div>
                <div class="col-6 text-end">
                  <button class="btn btn-success"><i class="bx bx-download"></i> Download File C1</button>
                </div>
              </div>
            </div>

            <div class="mt-4">
              <h5 class="font-size-16 mb-4">DPR RI: </h5>
              <div class="table-responsive">
                <table class="table table-nowrap table-hover mb-1">
                  <thead class="bg-light">
                    <tr>
                      <th scope="col" class="text-center">#</th>
                      <th scope="col">Nama Partai</th>
                      <th scope="col">Jumlah Suara</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">
                        1
                      </td>
                      <td>
                        <h5 class="font-size-14 mb-1">Nasdem</h5>
                      </td>
                      <td>
                        250
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <h5 class="font-size-16 mb-4 mt-5">DPD: </h5>
              <div class="table-responsive">
                <table class="table table-nowrap table-hover mb-1">
                  <thead class="bg-light">
                    <tr>
                      <th scope="col" class="text-center">#</th>
                      <th scope="col">Nama Partai</th>
                      <th scope="col">Jumlah Suara</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">
                        1
                      </td>
                      <td>
                        <h5 class="font-size-14 mb-1">Nasdem</h5>
                      </td>
                      <td>
                        250
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>


          </div>
        </div>
      </div>

      <div class="tab-pane" id="post" role="tabpanel">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12 text-center">
                <h5 class="font-size-16 mb-3">Verifikasi</h5>
                <img src="/assets/images/verification.svg" class="img-fluid" alt="verification-svg" width="400">
              </div>
              <div class="col-12 mt-5">
                <button class="btn btn-danger float-start"><i class="bx bx-x"></i> Revisi</button>
                <button class="btn btn-primary float-end"><i class="bx bx-check-double"></i> Setujui</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection