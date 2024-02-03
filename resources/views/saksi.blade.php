@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-lg-12 mb-3">
    <button class="btn btn-primary" id="btn-add" data-bs-target="#saksi-modal" data-bs-toggle="modal"><i
        class="mdi mdi-plus"></i>
      Tambah</button>
  </div>
  <div class="col-lg-12">
    <div id="saksi-modal" class="modal fade add-new" tabindex="-1" aria-labelledby="myExtraLargeModalLabel"
      style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="title-modal">Tambah Saksi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('Tambah Saksi') }}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="nama_saksi">Nama Saksi: </label>
                    <input type="text" class="form-control" placeholder="Nama Saksi" id="nama_saksi" name="nama">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-select" aria-label="Default select example" id="jenis_kelamin"
                      name="jenis_kelamin">
                      <option value="">Pilih Jenis Kelamin</option>
                      <option value="Laki-Laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="tps_id">TPS: </label>
                    <select class="form-select select2" aria-label="Default select example" id="tps_id" name="tps_id">
                      <option value="">Pilih TPS</option>
                      @foreach ($tps as $item)
                      <option value="{{ $item->id }}">{{ $item->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="email">Email: </label>
                    <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email">
                  </div>
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="password">Password: </label>
                  <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="nomor_hp">Nomor Hp: </label>
                  <input type="text" class="form-control" placeholder="Contoh: 62xxxx" id="nomor_hp" name="no_hp">
                  <small>Awali dengan 62 tanpa menulis 0</small>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12 text-end">
                  <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i
                      class="bx bx-x me-1 align-middle"></i> Batal</button>
                  <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success-btn"
                    id="btn-save-event"><i class="bx bx-save me-1 align-middle"></i> Simpan</button>
                </div>
              </div>
            </form>

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
              @foreach ($saksi as $item)
              <tr>
                <td>
                  {{ $item->user->name }}
                </td>
                <td>{{ $item->tps->nama }}</td>
                <td>{{ $item->tps->kecamatan }}</td>
                <td>{{ $item->tps->kabupaten }}</td>
                <td class="text-center">
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                      <a href="#saksi-modal" data-bs-toggle="tooltip" data-bs-placement="top"
                        onclick="edit({{ $item }})" class="px-2 text-primary" aria-label="Edit"
                        data-bs-original-title="Edit"><i class="bx bx-pencil font-size-18"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="javascript:void();" data-bs-toggle="tooltip" data-bs-placement="top"
                        onclick="confirmDelete('{{ Crypt::encrypt($item->id) }}')" class="px-2 text-danger"
                        aria-label="Delete" data-bs-original-title="Delete"><i
                          class="bx bx-trash-alt font-size-18"></i></a>
                    </li>
                  </ul>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        {{ $saksi->links('vendor.pagination.bootstrap-5') }}
      </div>
    </div>
  </div>
</div>

<script>
  const select2 = document.querySelector('.select2');
  const choice = new Choices(select2, {
    searchEnabled: true,
    itemSelectText: '',
    placeholder: true,
    placeholderValue: 'Pilih TPS',
    itemSelectText: 'Tekan untuk memilih',
    allowHTML: true,
  });
  const gender = document.querySelector('#jenis_kelamin');
  const choice2 = new Choices(gender, {
    searchEnabled: true,
    itemSelectText: '',
    placeholder: true,
    placeholderValue: 'Pilih Jenis Kelamin',
    itemSelectText: 'Tekan untuk memilih',
    allowHTML: true,
  });


  const edit = (id) => {
    console.log(id);
    const btn = document.getElementById('btn-add').click();
    const title = document.querySelector('#title-modal');
    const form = document.querySelector('form');
    title.innerHTML = 'Edit Saksi';
    form.action = `/saksi/${id.id}`;

    const nama = document.querySelector('#nama_saksi');
    const jenis_kelamin = document.querySelector('#jenis_kelamin');
    const tps_id = document.querySelector('#tps_id');
    const email = document.querySelector('#email');

    const nomor_hp = document.querySelector('#nomor_hp');

    nama.value = id.user.name;
    jenis_kelamin.value = id.user.jenis_kelamin;
    tps_id.value = id.tps_id;
    email.value = id.email;
    choice2.setChoiceByValue(id.jenis_kelamin);
    choice.setChoiceByValue(id.tps_id.toString());
    nomor_hp.value = id.no_hp;
  }


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
        const response = await fetch(`/saksi/${id}`, {
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

</script>
@endsection