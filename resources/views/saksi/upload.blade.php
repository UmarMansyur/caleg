@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-6 mb-3">
    <h4 class="card-title">Ikuti Step untuk mengupload form C1</h4>
  </div>
  <div class="col-6 mb-3 text-end">
    <button class="btn btn-info"><i class="bx bx-arrow-back"></i>Kembali</button>
  </div>
  <div class="col-lg-12">
    <div id="addproduct-accordion" class="custom-accordion">
      <div class="card">
        <a href="#addproduct-productinfo-collapse" class="text-body collapsed" data-bs-toggle="collapse"
          aria-expanded="false" aria-controls="addproduct-productinfo-collapse">
          <div class="p-4">

            <div class="d-flex align-items-center">
              <div class="flex-shrink-0 me-3">
                <div class="avatar">
                  <div class="avatar-title rounded-circle bg-primary-subtle  text-primary">
                    <h5 class="text-primary font-size-17 mb-0">01</h5>
                  </div>
                </div>
              </div>
              <div class="flex-grow-1 overflow-hidden">
                <h5 class="font-size-16 mb-1">Perolehan Suara</h5>
                <p class="text-muted text-truncate mb-0">Isi semua informasi dibawah ini</p>
              </div>
              <div class="flex-shrink-0">
                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
              </div>

            </div>

          </div>
        </a>

        <div id="addproduct-productinfo-collapse" class="collapse" data-bs-parent="#addproduct-accordion" style="">
          <div class="p-4 border-top">
            <form>
              <div class="row">
                <div class="col-lg-3">
                  <label class="form-label" for="total">Jumlah Total Suara: </label>
                  <input type="text" class="form-control" id="total" placeholder="Total Suara">
                </div>
                <div class="col-lg-3">
                  <label class="form-label" for="total">Jumlah Suara Sah: </label>
                  <input type="text" class="form-control" id="total" placeholder="Jumlah Suara Sah">
                </div>
                <div class="col-lg-3">
                  <label class="form-label" for="total">Jumlah Suara Tidak Sah: </label>
                  <input type="text" class="form-control" id="total" placeholder="Jumlah Suara Tidak Sah">
                </div>
                <div class="col-lg-3">
                  <label class="form-label" for="total">Jumlah Suara Partai: </label>
                  <input type="text" class="form-control" id="total" placeholder="Jumlah Suara Partai">
                </div>
                <div class="col-6 mt-3">
                  <button class="btn btn-light"><i class="mdi mdi-refresh"></i>Refresh</button>
                </div>
                <div class="col-6 mt-3 text-end">
                  <button class="btn btn-primary"><i class="mdi mdi-content-save"></i>Simpan</button>
                </div>
              
              </div>

              <div>
                <h5 class="mt-5">Perolehan Suara Calon</h5>
                <div class="table-responsive mt-3">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 200px" class="text-center">Nomor Urut</th>
                        <th style="width: 500px">Nama Calon</th>
                        <th style="width: 200px" class="text-center" colspan="3">Perolehan Suara</th>
                        <th class="text-center">#</th>
                      </tr>
                    </thead>
                    <tbody class="align-middle">
                      <tr>
                        <td class="text-center">01</td>
                        <td>Marzuki Alie</td>
                        <td class="text-center">1</td>
                        <td class="text-center">1</td>
                        <td class="text-center">1</td>
                        <td class="text-center">
                          <button class="btn btn-info btn-sm"><i class="bx bx-pencil"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">02</td>
                        <td>Abdullah Rizky</td>
                        <td class="text-center">
                          <input type="text" name="suara1[]" pattern="[0-9]" maxlength="1" class="form-control text-center" placeholder="0-9">
                      </td>
                      <td class="text-center">
                          <input type="text" name="suara2[]" pattern="[0-9]" maxlength="1" class="form-control text-center" placeholder="0-9">
                      </td>
                      <td class="text-center">
                          <input type="text" name="suara3[]" pattern="[0-9]" maxlength="1" class="form-control text-center" placeholder="0-9">
                      </td>
                      
                        <td class="text-center">
                          <button class="btn btn-primary btn-sm"><i class="bx bx-save"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="card">
        <a href="#addproduct-img-collapse" class="text-body collbodyd collapsed" data-bs-toggle="collapse"
          aria-haspopup="true" aria-expanded="false" aria-controls="addproduct-img-collapse">
          <div class="p-4">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0 me-3">
                <div class="avatar">
                  <div class="avatar-title rounded-circle bg-primary-subtle  text-primary">
                    <h5 class="text-primary font-size-17 mb-0">02</h5>
                  </div>
                </div>
              </div>
              <div class="flex-grow-1 overflow-hidden">
                <h5 class="font-size-16 mb-1">Lampiran File</h5>
                <p class="text-muted text-truncate mb-0">Upload file form C1</p>
              </div>
              <div class="flex-shrink-0">
                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
              </div>
            </div>
          </div>
        </a>

        <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
          <div class="p-4 border-top">
            <form action="#" class="dropzone">
              <div class="fallback">
                <input name="file" type="file" multiple="multiple">
              </div>
              <div class="dz-message needsclick">
                <div class="mb-3">
                  <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                </div>
                <h4 class="mb-0">Drop files here or click to upload.</h4>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection