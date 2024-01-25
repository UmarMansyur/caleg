@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <ol class="activity-checkout mb-0 px-4 mt-2">
          <li class="checkout-item">
            <div class="avatar checkout-icon p-1">
              <div class="avatar-title rounded-circle bg-primary">
                <h5 class="text-white font-size-16 mb-0">#1</h5>
              </div>
            </div>
            <div class="feed-item-list">
              <div>
                <h5 class="font-size-16 mb-1">Tempat Pemungut Suara</h5>
                <p class="text-muted text-truncate mb-4">Isi dengan benar!</p>
                <div class="mb-3">
                  <form>
                    <div>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label class="form-label" for="billing-name">Nama TPS: </label>
                            <input type="text" class="form-control" id="billing-name" placeholder="Enter name">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label class="form-label" for="billing-email-address">RT/RW</label>
                            <input type="email" class="form-control" id="billing-email-address"
                              placeholder="Enter email">
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="mb-3">
                            <label class="form-label" for="billing-email-address">Desa</label>
                            <input type="email" class="form-control" id="billing-email-address"
                              placeholder="Enter email">
                          </div>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label class="form-label" for="billing-address">Alamat Lengkap</label>
                        <textarea class="form-control" id="billing-address" rows="3"
                          placeholder="Enter full address"></textarea>
                      </div>

                      <div class="row">
                        <div class="col-lg-4">
                          <label for="kabupaten" class="form-label">Kabupaten: </label>
                          <input type="text" name="kabupaten" id="kabupaten" class="form-control">
                        </div>

                        <div class="col-lg-4">
                          <label for="kecamatan" class="form-label">Kecamatan: </label>
                          <input type="text" name="kecamatan" id="kecamatan" class="form-control">
                        </div>

                        <div class="col-lg-4">
                          <div class="mb-0">
                            <label class="form-label" for="zip-code">Kode POS</label>
                            <input type="text" class="form-control" id="zip-code" placeholder="Enter Postal code">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary float-end">
                  <i class="mdi mdi-plus"></i> Tambah
                </button>
              </div>
            </div>
          </li>
          <li class="checkout-item">
            <div class="avatar checkout-icon p-1">
              <div class="avatar-title rounded-circle bg-primary">
                <h5 class="text-white font-size-16 mb-0">#2</h5>
              </div>
            </div>
            <div class="feed-item-list">
              <div>
                <h5 class="font-size-16 mb-1">Daftar Tempat Pemungut Suara</h5>
                <p class="text-muted text-truncate mb-4">Berikut adalah daftar TPS yang sudah terdaftar</p>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable">
                    <thead>
                      <tr>
                        <th style="width: 5%" class="text-center">No</th>
                        <th style="width: 20%">Nama TPS</th>
                        <th style="width: 20%">Desa</th>
                        <th style="width: 20%">Kecamatan</th>
                        <th class="text-center">Kode POS</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">1</td>
                        <td>TPS 1</td>
                        <td>Desa 1</td>
                        <td>Kecamatan 1</td>
                        <td class="text-center">12345</td>
                        <td class="text-center">
                          <button class="btn btn-warning"><i class="bx bx-pencil"></i> Edit</button>
                          <button class="btn btn-danger"><i class="bx bx-trash"></i> Hapus</button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">2</td>
                        <td>TPS 2</td>
                        <td>Desa 2</td>
                        <td>Kecamatan 2</td>
                        <td class="text-center">12345</td>
                        <td class="text-center">
                          <button class="btn btn-warning"><i class="bx bx-pencil"></i> Edit</button>
                          <button class="btn btn-danger"><i class="bx bx-trash"></i> Hapus</button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">3</td>
                        <td>TPS 3</td>
                        <td>Desa 3</td>
                        <td>Kecamatan 3</td>
                        <td class="text-center">12345</td>
                        <td class="text-center">
                          <button class="btn btn-warning"><i class="bx bx-pencil"></i> Edit</button>
                          <button class="btn btn-danger"><i class="bx bx-trash"></i> Hapus</button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">4</td>
                        <td>TPS 4</td>
                        <td>Desa 4</td>
                        <td>Kecamatan 4</td>
                        <td class="text-center">12345</td>
                        <td class="text-center">
                          <button class="btn btn-warning"><i class="bx bx-pencil"></i> Edit</button>
                          <button class="btn btn-danger"><i class="bx bx-trash"></i> Hapus</button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">5</td>
                        <td>TPS 5</td>
                        <td>Desa 5</td>
                        <td>Kecamatan 5</td>
                        <td class="text-center">12345</td>
                        <td class="text-center">
                          <button class="btn btn-warning"><i class="bx bx-file"></i> Edit</button>
                          <button class="btn btn-danger"><i class="bx bx-trash"></i> Hapus</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>
@endsection