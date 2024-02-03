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
                <h5 class="font-size-16">Perolehan Suara Calon - ({{ $form->tps->nama }})</h5>
                <h4 class="font-size-15 mb-3 mt-2">{{ $form->tps->kecamatan }}, {{ $form->tps->kabupaten }}</h4>
              </div>
              <div class="col-6">
                <div class="text-end">
                  @if($form->status == 'pending')
                  <span class="badge bg-info">Menunggu Konfirmasi</span>
                  @elseif($form->status == 'verified')
                  <span class="badge bg-success">Terverifikasi</span>
                  @else
                  <span class="badge bg-danger">Revisi</span>
                  @endif
                </div>
              </div>
            </div>
            <div class="mt-4">
              <h5 class="font-size-15">Rekap Perolehan Suara: </h5>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> {{ $form->jumlah_suara }} Total
                Suara
              </p>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> {{ $form->jumlah_suara_tidak_sah }}
                Suara Tidak Sah
              </p>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> {{ $form->jumlah_suara_sah }} Suara
                Sah
              </p>
              <p>
                <i class="mdi mdi-circle-medium text-success align-middle me-1"></i> {{ $form->jumlah_suara_sah_partai
                }} Suara Partai
              </p>

              <h5 class="font-size-15 mt-4">Saksi :</h5>
              <div class="row">
                <div class="col-6">
                  <p class="mb-0">
                    Nama Saksi: {{ $form->saksi->user->name }}
                  </p>
                  <p class="mb-0">
                    Jenis Kelamin: {{ $form->saksi->user->jenis_kelamin }}
                  </p>
                  <p class="mb-0">
                    Nomor Telepon: +{{ $form->saksi->user->no_hp }}
                  </p>

                </div>
                <div class="col-6 text-end">
                  <a class="btn btn-success" href="{{ asset('storage/' . $form->file_c1) }}" download>
                    <i class="bx bx-download"></i> Download File C1
                  </a>
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
                    @foreach($form->detail as $item)
                    <tr>
                      <td class="text-center">
                        {{ $item->calon->no_urut }}
                      </td>
                      <td>
                        <h5 class="font-size-14 mb-1">
                          {{ $item->calon->nama }}
                        </h5>
                      </td>
                      <td>
                        {{ $item->jumlah_suara }}
                      </td>
                    </tr>
                    @endforeach
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
                <button class="btn btn-danger float-start" data-bs-toggle="modal" data-bs-target="#revisi"><i class="bx bx-x"></i> Revisi</button>
                <button class="btn btn-primary float-end" onclick="confirmSetujui()"><i class="bx bx-check-double"></i>
                  Setujui</button>
              </div>
              <div class="col-12">
                <div class="modal fade" id="revisi" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" style="display: none;"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="title-modal">Tambah Calon Legislatif</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('Revisi Data') }}" method="POST" enctype="multipart/form-data" id="form">
                          @csrf
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan: </label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                <input type="hidden" name="id" value="{{ $form->id }}">
                                <input type="hidden" name="status" value="rejected">
                              </div>
                            </div>
                          </div>
                          <div class="row mt-2">
                            <div class="col-12 text-end">
                              <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal"><i
                                  class="bx bx-x me-1 align-middle"></i> Batal</button>
                              <button type="submit" class="btn btn-primary"><i class="bx bx-send"></i> Simpan</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  async function confirmSetujui() {
    Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Anda tidak dapat mengubah keputusan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#4bca81',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Setujui!'
    }).then(async (result) => {
      if (result.isConfirmed) {
        const id = '{{ $form->id }}';
        const response = await fetch(`{{ route('Verifikasi Berkas') }}`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
          },
          body: JSON.stringify({
            id: id,
            status: 'verified'
          })
        });
        const data = await response.json();
        if (!response.ok) {
          Swal.fire(
            'Gagal!',
            data.message,
            'error'
          )
          window.location.reload();
          return;
        }
        if(data.data) {
          Swal.fire(
            'Berhasil!',
            data.message,
            'success'
          )
          window.location.reload();
          return;
        }
        Swal.fire(
          'Gagal!',
          data.message,
          'error'
        )
      }
    })
  }
</script>

@endsection