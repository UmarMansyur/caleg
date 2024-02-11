@extends('layouts.main')
@section('content')
<div class="row mt-2">
  <div class="col-12 mb-3 text-end">
    <a href="#" data-bs-toggle="modal" data-bs-target=".add-new" class="btn btn-primary" id="btn-modal" onclick="clearForm()"><i class="bx bx-plus me-1"></i>
      Tambah Baru</a>
  </div>
  <div class="col-12">
    <div class="modal fade add-new" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" style="display: none;"
      aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="title-modal">Tambah Calon Legislatif</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('Tambah Calon') }}" method="POST" enctype="multipart/form-data" id="form">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="nama">Nama Calon: </label>
                    <input type="text" class="form-control" placeholder="Nama Calon" id="nama" name="nama">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select gender" aria-label="Default select example" name="jenis_kelamin"
                      id="jenis_kelamin">
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="Laki-Laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="no-urut">Nomor Urut: </label>
                    <input type="text" class="form-control" placeholder="Contoh: 01" id="no_urut" name="no_urut">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="AddNew-Email">Pilih Partai: </label>
                    <select name="partai" id="partai" class="form-control select2" required>
                      <option value="">Pilih Partai</option>
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
                    <label class="form-label" for="foto">Foto: </label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    <small id="edit-foto" style="display: none;" class="text-danger">Jangan mengupload foto, jika anda tidak ingin mengubah foto.</small>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12 text-end">
                  <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal"><i
                      class="bx bx-x me-1 align-middle"></i> Batal</button>
                  <button type="submit" class="btn btn-primary"><i class="bx bx-plus"></i> Tambah</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @foreach($calon as $c)
  <div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="dropdown float-end">
          <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true">
            <i class="bx bx-dots-horizontal text-muted font-size-20"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="javascript:void(0);" onclick="edit('{{ $c }}')">Ubah</a>
            <a class="dropdown-item" href="javascript:void(0);"
              onclick="confirmDelete('{{ Crypt::encrypt($c->id) }}')">Hapus</a>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div>
            <img src="{{ file_exists(asset('storage/' . $c->foto)) ? asset('storage/' . $c->foto) : $c->foto }}"
              alt="" class="avatar-md rounded-circle">
          </div>
          <div class="flex-1 ms-3">
            <h5 class="font-size-16 mb-1"><a href="#" class="text-body">{{ $c->nama }}</a></h5>
            <span class="badge bg-success-subtle text-success  mb-0">#{{ $c->no_urut }}</span>
          </div>
        </div>


        <div class="mt-3 pt-1">
          <p class="mb-0"><i class="mdi mdi-gender-male
            font-size-15 align-middle pe-2 text-primary"></i>{{ $c->jenis_kelamin }}</p>
          <p class="mb-0 mt-2"><i class="mdi mdi-leek font-size-15 align-middle pe-2 text-primary"></i>
            {{ $c->no_urut }}
          </p>

          <p class="mb-0 mt-2"><i class="mdi mdi-flag font-size-15 align-middle pe-2 text-primary"></i>
            {{ $c->partai }}
          </p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{ $calon->links('vendor.pagination.bootstrap-5') }}
<script>
  const element = document.querySelector('.select2');
  const gender = document.querySelector('.gender');
  const partaiSelect = new Choices(element, {
    searchEnabled: true,
    itemSelectText: '',
    placeholder: true,
    placeholderValue: 'Pilih Partai',
    itemSelectText: 'Tekan untuk memilih',
    allowHTML: true,
  });
  const genderSelect = new Choices(gender, {
    searchEnabled: true,
    itemSelectText: '',
    placeholder: true,
    placeholderValue: 'Pilih Jenis Kelamin',
    itemSelectText: 'Tekan untuk memilih',
    allowHTML: true,
  })


  function confirmDelete(id) {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data yang dihapus tidak dapat dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#536de6',
      cancelButtonColor: '#fc544b',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal'
    }).then(async (result) => {
      if(result.isConfirmed) {
        const response = await fetch(`/calon/${id}`, {
          method: 'DELETE',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
        });
        const data = await response.json();
        if(data) {
          Swal.fire(
            'Terhapus!',
            'Data berhasil dihapus.',
            'success'
          ).then(() => {
            window.location.reload();
          })
        }
      }
    })
  }

  function edit(data) {
    document.getElementById('edit-foto').style.display = 'block';
    document.getElementById('title-modal').innerHTML = 'Ubah Calon Legislatif';
    data = JSON.parse(data);
    const element = document.getElementById('btn-modal').click();
    const nama = document.getElementById('nama');
    const jenis_kelamin = document.getElementById('jenis_kelamin');
    const no_urut = document.getElementById('no_urut');
    const partai = document.getElementById('partai');
    
    nama.value = data.nama;
    partaiSelect.setChoiceByValue(data.partai);
    genderSelect.setChoiceByValue(data.jenis_kelamin);
    no_urut.value = data.no_urut;
    partai.value = data.partai;
    const form = document.getElementById('form');
    form.action = `/calon/${data.id}`;
  }

  function clearForm() {
    document.getElementById('title-modal').innerHTML = 'Tambah Calon Legislatif';
    document.getElementById('edit-foto').style.display = 'none';
    // set ke default
    genderSelect.setChoiceByValue('');
    partaiSelect.setChoiceByValue('');
    const nama = document.getElementById('nama');
    const jenis_kelamin = document.getElementById('jenis_kelamin');
    const no_urut = document.getElementById('no_urut');
    const partai = document.getElementById('partai');
    nama.value = '';
    jenis_kelamin.value = '';
    no_urut.value = '';
    partai.value = '';
    const form = document.getElementById('form');
    form.action = `{{ route('Tambah Calon') }}`;
  }
</script>

@endsection