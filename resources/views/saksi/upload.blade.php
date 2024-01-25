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
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label" for="manufacturername">Nama Calon</label>
                    <select class="form-select select2" data-trigger name="choices-single-category"
                      id="choices-single-category">
                      <option value="1">Deny Setiawan</option>
                      <option value="2">Marzuki Alie</option>
                    </select>

                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label class="form-label" for="manufacturername">Tingkatan</label>
                    <input id="manufacturername" name="manufacturername" type="text" class="form-control" value="DPR RI"
                      readonly>
                  </div>
                </div>
                <div class="col-3">
                  <label class="form-label" for="manufacturername">Perolehan Suara: </label>
                  <input type="text" class="form-control" id="basicpill-firstname-input3" placeholder="Suara Masuk"
                    name="firstname">
                </div>
                <div class="col-12 mt-3">
                  <button class="btn btn-primary"><i class="mdi mdi-plus"></i>Tambah</button>
                </div>
              </div>

              <div>

                <div class="table-responsive mt-3">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 100px" class="text-center">No</th>
                        <th>Nama Partai</th>
                        <th>Tingkatan</th>
                        <th>Perolehan Suara</th>
                        <th class="text-center">#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">1</td>
                        <td>Marzuki Alie</td>
                        <td>DPR RI</td>
                        <td>100</td>
                        <td class="text-center">
                          <button class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></button>
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
        <a href="#partai" class="text-body collapsed" data-bs-toggle="collapse" aria-expanded="false"
          aria-controls="partai">
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
                <h5 class="font-size-16 mb-1">Total Perolehan Suara Partai</h5>
                <p class="text-muted text-truncate mb-0">Isi semua informasi dibawah ini</p>
              </div>
              <div class="flex-shrink-0">
                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
              </div>

            </div>

          </div>
        </a>

        <div id="partai" class="collapse" data-bs-parent="#addproduct-accordion" style="">
          <div class="p-4 border-top">
            <form>
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label" for="manufacturername">Nama Partai</label>
                    <select class="form-select select2" data-trigger name="choices-single-category"
                      id="choices-single-category">
                      <option value="1">Demokrat</option>
                      <option value="2">Gerinda</option>
                    </select>

                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="mb-3">
                    <label class="form-label" for="manufacturername">Tingkatan</label>
                    <input id="manufacturername" name="manufacturername" type="text" class="form-control" value="DPR RI"
                      readonly>
                  </div>
                </div>
                <div class="col-3">
                  <label class="form-label" for="manufacturername">Perolehan Suara: </label>
                  <input type="text" class="form-control" id="basicpill-firstname-input3" placeholder="Suara Masuk"
                    name="firstname">
                </div>
                <div class="col-12 mt-3">
                  <button class="btn btn-primary"><i class="mdi mdi-plus"></i>Tambah</button>
                </div>
              </div>

              <div>

                <div class="table-responsive mt-3">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 100px" class="text-center">No</th>
                        <th>Nama Calon</th>
                        <th>Tingkatan</th>
                        <th>Perolehan Suara</th>
                        <th class="text-center">#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">1</td>
                        <td>Marzuki Alie</td>
                        <td>DPR RI</td>
                        <td>100</td>
                        <td class="text-center">
                          <button class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></button>
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
        <a href="#perolehan-suara" class="text-body collapsed" data-bs-toggle="collapse" aria-expanded="false"
          aria-controls="perolehan-suara">
          <div class="p-4">

            <div class="d-flex align-items-center">
              <div class="flex-shrink-0 me-3">
                <div class="avatar">
                  <div class="avatar-title rounded-circle bg-primary-subtle  text-primary">
                    <h5 class="text-primary font-size-17 mb-0">03</h5>
                  </div>
                </div>
              </div>
              <div class="flex-grow-1 overflow-hidden">
                <h5 class="font-size-16 mb-1">Total Perolehan Suara</h5>
                <p class="text-muted text-truncate mb-0">Isi semua informasi dibawah ini</p>
              </div>
              <div class="flex-shrink-0">
                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
              </div>

            </div>

          </div>
        </a>

        <div id="perolehan-suara" class="collapse" data-bs-parent="#addproduct-accordion" style="">
          <div class="p-4 border-top">
            <form>
              <div class="row">
                <div class="col-lg-4">
                  <div class="mb-3">
                    <label class="form-label" for="manufacturername">Jumlah Suara Sah: </label>
                    <input id="manufacturername" name="manufacturername" type="text" class="form-control" 
                      readonly>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label class="form-label" for="manufacturername">Jumlah Suara Tidak Sah: </label>
                  <input type="text" class="form-control" id="basicpill-firstname-input3" placeholder="Suara Masuk"
                    name="firstname">
                </div>
                <div class="col-lg-4">
                  <label class="form-label" for="manufacturername">Jumlah Total Suara: </label>
                  <input type="text" class="form-control" id="basicpill-firstname-input3" placeholder="Suara Masuk"
                    name="firstname">
                </div>
                <div class="col-12 mt-3">
                  <button class="btn btn-primary"><i class="mdi mdi-plus"></i>Tambah</button>
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
                    <h5 class="text-primary font-size-17 mb-0">04</h5>
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