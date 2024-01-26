@extends('layouts.main')
@section('content')
<div class="row mt-2">
  <div class="col-12 mb-3 text-end">
    <a href="#" data-bs-toggle="modal" data-bs-target=".add-new" class="btn btn-primary"><i class="bx bx-plus me-1"></i>
      Tambah Baru</a>
  </div>
  <div class="col-12">
    <div class="modal fade add-new" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" style="display: none;"
      aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Calon Legislatif</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="AddNew-Username">Nama Calon: </label>
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
                  <label class="form-label" for="AddNew-Email">Nomor Urut: </label>
                  <input type="text" class="form-control" placeholder="Enter Email" id="AddNew-Email">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="AddNew-Email">Pilih Partai: </label>
                    <select name="partai" id="partai" class="form-control">
                      <option value="PKB">Partai Kebangkitan Bangsa (PKB)</option>
                      <option value="Gerindra">Partai Gerakan Indonesia Raya (Gerindra)</option>
                      <option value="PDIP">Partai Demokrasi Indonesia Perjuangan (PDI Perjuangan)</option>
                      <option value="Golkar">Partai Golongan Karya (Golkar)</option>
                      <option value="NasDem">Partai NasDem</option>
                      <option value="Buruh">Partai Buruh</option>
                      <option value="Gelora">Partai Gelombang Rakyat Indonesia (Gelora)</option>
                      <option value="PKS">Partai Keadilan Sejahtera (PKS)</option>
                      <option value="PKN">Partai Kebangkitan Nusantara (PKN)</option>
                      <option value="Hanura">Partai Hati Nurani Rakyat (Hanura)</option>
                      <option value="Garuda">Partai Garda Perubahan Indonesia (Garuda)</option>
                      <option value="PAN">Partai Amanat Nasional (PAN)</option>
                      <option value="PBB">Partai Bulan Bintang (PBB)</option>
                      <option value="Demokrat">Partai Demokrat</option>
                      <option value="PSI">Partai Solidaritas Indonesia (PSI)</option>
                      <option value="Perindo">Partai Persatuan Indonesia (Perindo)</option>
                      <option value="PPP">Partai Persatuan Pembangunan (PPP)</option>
                      <option value="UMMAT">Partai UMMAT</option>
                    </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label" for="AddNew-Email">Foto: </label>
                  <input type="file" class="form-control" placeholder="Enter Email" id="AddNew-Email">
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12 text-end">
                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal"><i
                    class="bx bx-x me-1 align-middle"></i> Batal</button>
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success-btn"
                  id="btn-save-event"><i class="bx bx-plus"></i> Tambah</button>
              </div>
            </div>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
  </div>
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="dropdown float-end">
          <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true">
            <i class="bx bx-dots-horizontal text-muted font-size-20"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Ubah</a>
            <a class="dropdown-item" href="#">Hapus</a>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div>
            <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
          </div>
          <div class="flex-1 ms-3">
            <h5 class="font-size-16 mb-1"><a href="#" class="text-body">Abdullah Rizky</a></h5>
            <span class="badge bg-success-subtle text-success  mb-0">#1</span>
          </div>
        </div>


        <div class="mt-3 pt-1">
          <p class="mb-0"><i class="mdi mdi-gender-male
            font-size-15 align-middle pe-2 text-primary"></i>Pria</p>
          <p class="mb-0 mt-2"><i class="mdi mdi-leek font-size-15 align-middle pe-2 text-primary"></i>01</p>

          <p class="mb-0 mt-2"><i class="mdi mdi-flag font-size-15 align-middle pe-2 text-primary"></i>
            Golkar
          </p>
        </div>



      </div>
    </div>
    <!-- end card -->
  </div>
  <!-- end col -->
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="dropdown float-end">
          <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true">
            <i class="bx bx-dots-horizontal text-muted font-size-20"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Ubah</a>
            <a class="dropdown-item" href="#">Hapus</a>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div>
            <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle img-thumbnail">
          </div>
          <div class="flex-1 ms-3">
            <h5 class="font-size-16 mb-1"><a href="#" class="text-body">James Nix</a></h5>
            <span class="badge bg-success-subtle text-success  mb-0">#2</span>
          </div>
        </div>

        <div class="mt-3 pt-1">
          <p class="mb-0"><i class="mdi mdi-phone font-size-15 align-middle pe-2 text-primary"></i>
            046 5685 6969</p>
          <p class="mb-0 mt-2"><i class="mdi mdi-email font-size-15 align-middle pe-2 text-primary"></i>
            JamesNix@spy.com</p>
          <p class="mb-0 mt-2"><i class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-primary"></i>
            5 Boar Lane SELLING 2LG</p>
        </div>

      </div>
    </div>
    <!-- end card -->
  </div>
</div>
<div class="row g-0 align-items-center pb-3">
  <div class="col-sm-6">
    <div>
      <p class="mb-sm-0">Showing 1 to 10 of 57 entries</p>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="float-sm-end">
      <ul class="pagination mb-sm-0">
        <li class="page-item disabled">
          <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
        </li>
        <li class="page-item active">
          <a href="#" class="page-link">1</a>
        </li>
        <li class="page-item">
          <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
        </li>
      </ul>
    </div>
  </div>
</div>

@endsection