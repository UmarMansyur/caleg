@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-lg-12 mb-3">
    <button class="btn btn-primary" data-bs-target="#saksi-modal" data-bs-toggle="modal"><i class="mdi mdi-plus"></i> Tambah</button>
  </div>
  <div class="col-lg-12">
    <div id="saksi-modal" class="modal fade add-new" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" style="display: none;"
      aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Saksi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="AddNew-Username">Nama Saksi: </label>
                  <input type="text" class="form-control" placeholder="Enter Username" id="AddNew-Username">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Jenis Kelamin</label>
                  <select class="form-select">
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="1">Laki-laki</option>
                    <option value="2">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="AddNew-Email">TPS: </label>
                  <select class="form-select">
                    <option selected>Pilih TPS</option>
                    <option value="1">TPS 01</option>
                    <option value="2">TPS 02</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="AddNew-Email">Email: </label>
                  <input type="text" class="form-control" placeholder="Enter Email" id="AddNew-Email">
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="AddNew-Email">Password: </label>
                <input type="text" class="form-control" placeholder="Enter Email" id="AddNew-Email">
              </div>
              <div class="col-md-6">
                <label class="form-label" for="AddNew-Email">Konfirmasi Password: </label>
                <input type="text" class="form-control" placeholder="Enter Email" id="AddNew-Email">
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12 text-end">
                <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i
                    class="bx bx-x me-1 align-middle"></i> Batal</button>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success-btn"
                  id="btn-save-event"><i class="bx bx-check me-1 align-middle"></i> Tambah</button>
              </div>
            </div>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
  </div>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-nowrap align-middle">
            <thead class="table-light">
              <tr>
                <th scope="col">Nama Saksi</th>
                <th scope="col">Nama TPS</th>
                <th scope="col">Kecamatan</th>
                <th scope="col">Kabupaten/Kota</th>
                <th scope="col" style="width: 200px;" class="text-center">Aksi</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>
                  <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar rounded-circle img-thumbnail me-2">
                  <a href="#" class="text-body">Umar Mansyur</a>
                </td>
                <td>Tempat Pemungutan Suara 01</td>
                <td>Tlanakan</td>
                <td>Pamekasan</td>
                <td class="text-center">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                      <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                        class="px-2 text-primary" aria-label="Edit" data-bs-original-title="Edit"><i
                          class="bx bx-pencil font-size-18"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top"
                        class="px-2 text-danger" aria-label="Delete" data-bs-original-title="Delete"><i
                          class="bx bx-trash-alt font-size-18"></i></a>
                    </li>
                  </ul>
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