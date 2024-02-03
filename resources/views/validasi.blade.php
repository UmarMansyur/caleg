@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">

        <div class="">
          <div class="row mb-2">
            <div class="col-xl-3 col-md-12">
              <div class="pb-3 pb-xl-0">
                <form class="email-search" method="GET">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light" placeholder="Cari..." aria-label="Cari..."
                      aria-describedby="searchemail" name="search">
                    <button class="btn btn-info">
                      <i class="bx bx-search font-size-18"></i>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-nowrap align-middle mb-0">
            <thead class="align-middle">
              <tr>
                <th class="text-center" rowspan="2">No</th>
                <th rowspan="2">Nama TPS</th>
                <th colspan="3" class="text-center">Jumlah Suara</th>
                <th class="text-center" rowspan="2">Status</th>
                <th class="text-center" rowspan="2">Aksi</th>
              </tr>
              <tr>
                <th class="text-center">Sah</th>
                <th class="text-center">Tidak Sah</th>
                <th class="text-center">Total</th>
              </tr>
            </thead>
            <tbody>
              @if(!$form->isEmpty())
              @foreach($form as $item)
              <tr>
                <td class="text-center">
                  {{ $loop->iteration }}
                </td>
                <td>
                  <p class="mb-0">
                    {{ $item->tps->nama }}
                  </p>
                </td>
                <td class="text-center">
                  <p class="mb-0">
                    {{ $item->jumlah_suara_sah }}
                  </p>
                </td>
                <td class="text-center">
                  <p class="mb-0">
                    {{ $item->jumlah_suara_tidak_sah }}
                  </p>
                </td>
                <td class="text-center">
                  <p class="mb-0">
                    {{ $item->jumlah_suara }}
                  </p>
                </td>

                <td>
                  <div class="text-center">
                    @if($item->status == 'pending')
                    <span class="badge bg-info">Menunggu Konfirmasi</span>
                    @elseif($item->status == 'verified')
                    <span class="badge bg-success">Terverifikasi</span>
                    @else
                    <span class="badge bg-danger">Revisi</span>
                    @endif
                  </div>
                </td>
                <td class="text-center">
                  <div class="d-flex justify-content-center">
                    <a href="{{ route('Detail Berkas', Crypt::encrypt($item->id)) }}"
                      class="btn btn-info btn-sm waves-effect waves-light me-2"><i class="mdi mdi-eye-outline"></i>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
              @endif
              @if($form->isEmpty())
              <tr>
                <td colspan="7" class="text-center">Data tidak ditemukan</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
        {{ $form->links() }}
      </div>
    </div>
  </div>
</div>
@endsection