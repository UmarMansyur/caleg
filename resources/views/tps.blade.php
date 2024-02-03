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
              <h5 class="font-size-16 mb-1">Tempat Pemungut Suara</h5>
              <p class="text-muted text-truncate mb-4">Isi dengan benar!</p>
              <form method="POST"
                action="{{ empty($tps) ? route('Tambah TPS') : route('Edit TPS', Crypt::encrypt($tps->id)) }}">
                @csrf
                <div class="mb-3">
                  <div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="nama">Nama TPS: </label>
                          <input type="text" class="form-control" id="nama" placeholder="Nama TPS" name="nama"
                            value="{{ empty($tps) ? '' : $tps->nama }}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="rt-rw">RT/RW</label>
                          <input type="text" class="form-control" id="rt-rw" name="rt_rw" placeholder="RT/RW"
                            value="{{ empty($tps) ? '' : $tps->rt_rw }}">
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label" for="desa">Desa</label>
                          <input type="text" class="form-control" id="desa" placeholder="Nama Desa" name="desa"
                            value="{{ empty($tps) ? '' : $tps->desa }}">
                        </div>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="alamat">Alamat Lengkap</label>
                      <textarea class="form-control" id="alamat" rows="3" placeholder="Alamat Lengkap" name="alamat">{{ 
                            empty($tps) ? '' : $tps->alamat
                          }}</textarea>
                    </div>

                    <div class="row">
                      <div class="col-lg-4">
                        <label for="kabupaten" class="form-label">Kabupaten: </label>
                        <input type="text" name="kabupaten" id="kabupaten" placeholder="Kabupaten"
                          value="{{ empty($tps) ? '' : $tps->kabupaten }}" class="form-control">
                      </div>

                      <div class="col-lg-4">
                        <label for="kecamatan" class="form-label">Kecamatan: </label>
                        <input type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan"
                          value="{{ empty($tps) ? '' : $tps->kecamatan }}" class="form-control">

                      </div>

                      <div class="col-lg-4">
                        <div class="mb-0">
                          <label class="form-label" for="kode_pos">Kode POS</label>
                          <input type="text" class="form-control" id="kode_pos" placeholder="Kode Pos" name="kode_pos"
                            value="{{ empty($tps) ? '' : $tps->kode_pos }}">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  @if (empty($tps))
                  <button class="btn btn-primary float-end" type="submit">
                    <i class="mdi mdi-plus"></i> Tambah
                  </button>
                  @else
                  <a href="/tps" class="btn btn-light">
                    <i class="mdi mdi-refresh"></i> Batal
                  </a>
                  <button class="btn btn-info float-end" type="submit">
                    <i class="bx bx-save"></i> Simpan
                  </button>
                  @endif
                </div>
              </form>
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
                  <div class="table-gridjs">
                    <table id="table-gridjs"></table>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ol>
      </div>
    </div>
  </div>
</div>

<script>
  async function getData() {
    try {
      const fetchResult = await fetch("{{ route('Data TPS') }}");
      const data = await fetchResult.json();
      return data;
    } catch (error) {
      console.error('Error fetching data:', error);
      return [];
    }
  }

  const grid = new gridjs.Grid({
    columns: ["No", "Nama TPS", "Desa", "Kecamatan", "Kode POS", {
      id: 'action_button', // required for event listeners to work properly
      name: "Aksi",
      formatter: (_, row) => gridjs.html(`

      <a href="/tps/data/${row.cells[5].data}" class="btn btn-warning"><i class="bx bx-pencil"></i> Edit</a>
      <a href="javascript:void(0)" class="btn btn-danger" onclick="confirmDelete('${row.cells[5].data}')" type="button"><i class="bx bx-trash"></i> Hapus</a>
      `)
    }],
    // columns tanggal lahir, alamat, rt/rw, kabupaten, kecamatan, kode pos, aksi
    pagination: { limit: 5 },
    search: true,
    server: {
      url: "{{ route('Data TPS') }}",
      then: (data) => data.map((item) => Object.values(item)),
    },
  }).render(document.getElementById("table-gridjs"));


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
        const response = await fetch(`/tps/${id}`, {
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