@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-6 mb-3">
    <h4 class="card-title">Ikuti Step untuk mengupload form C1</h4>
  </div>
  @if(!empty($form) && $form->status == 'verified')
  <div class="col-lg-12">
    <div class="alert alert-warning">
      <h6 class="alert-heading">Perhatian!</h6>
      <p class="mb-0">Laporan anda sudah diverifikasi oleh verifikator. Anda tidak dapat mengubah laporan ini!</p>
    </div>
  </div>
  @endif
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
            <form action="{{ route('Tambah Lapor') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-6 mt-1">
                  <a href="/lapor" class="btn btn-light"><i class="mdi mdi-refresh"></i>Refresh</a>
                </div>
                <div class="col-6 mt-1 text-end">
                  <button class="btn btn-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                </div>

              </div>

              <div>
                <div class="table-responsive mt-3">
                  <table class="table table-bordered table-nowrap align-middle">
                    <thead class="align-middle">
                      <tr>
                        <th style="width: 200px" class="text-center">Nomor Urut</th>
                        <th style="width: 500px">Nama Calon</th>
                        <th style="width: 900px" class="text-center" colspan="3">Perolehan Suara</th>
                      </tr>
                    </thead>
                    <tbody class="align-middle">
                      @foreach ($calon as $item)
                      <tr>
                        <td class="text-center">{{$item->no_urut}}</td>
                        <td>{{ $item->nama }}</td>
                        <td style="width: 300px" >
                          <input type="text" name="vote-{{$item->id}}[]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap('{{$item->id}}')"
                            value="{{ !empty($item->detail) && count($item->detail) > 0 && count($item->detail) > 0 && $item->detail[0]->jumlah_suara > 99 ? strval($item->detail[0]->jumlah_suara)[0] : '' }}">
                          <input type="hidden" name="id_calon[]" value="{{ $item->id }}">
                        </td>
                        <td  style="width: 300px" class="text-center">
                          @if (!empty($item->detail) && count($item->detail) > 0 && $item->detail[0]->jumlah_suara > 9
                          &&
                          $item->detail[0]->jumlah_suara < 100 ) <input type="text" name="vote-{{$item->id}}[]"
                            pattern="[0-9]" maxlength="1"
                            value="{{ !empty($item->detail) && count($item->detail) > 0 ? strval($item->detail[0]->jumlah_suara)[0] : '' }}"
                            class="form-control text-center"  onkeyup="rekap('{{$item->id}}')">
                            @endif
                            @if (!empty($item->detail) && count($item->detail) > 0 && $item->detail[0]->jumlah_suara >
                            99)
                            <input type="text" name="vote-{{$item->id}}[]" pattern="[0-9]" maxlength="1"
                              value="{{ !empty($item->detail) && count($item->detail) > 0 ? strval($item->detail[0]->jumlah_suara)[1] : '' }}"
                              class="form-control text-center"  onkeyup="rekap('{{$item->id}}')">
                            @endif
                            @if (!empty($item->detail) && count($item->detail) > 0 && $item->detail[0]->jumlah_suara <
                              10) <input type="text" name="vote-{{$item->id}}[]" pattern="[0-9]" maxlength="1"
                              class="form-control text-center"  onkeyup="rekap('{{$item->id}}')">
                              @endif
                              @if (count($item->detail) == 0)
                              <input type="text" name="vote-{{$item->id}}[]" pattern="[0-9]" maxlength="1"
                                class="form-control text-center"  onkeyup="rekap('{{$item->id}}')" value="0">
                              @endif
                        </td >
                        <td  style="width: 300px" class="text-center">
                          @if (!empty($item->detail) && count($item->detail) > 0 && $item->detail[0]->jumlah_suara <= 9)
                            <input type="text" name="vote-{{$item->id}}[]" pattern="[0-9]" maxlength="1" value="{{ empty($item->detail) && $item->detail[0]->jumlah_suara > 0 ? '' :
                          strval($item->detail[0]->jumlah_suara)[0]}}" class="form-control text-center"
                             onkeyup="rekap('{{$item->id}}')">
                            @endif
                            <input type="hidden" name="rekapSuaraCalon[]">
                            @if (!empty($item->detail) && count($item->detail) > 0 && $item->detail[0]->jumlah_suara > 9 &&
                            $item->detail[0]->jumlah_suara < 100 ) <input type="text" name="vote-{{$item->id}}[]"
                              pattern="[0-9]" maxlength="1" value="{{ empty($item->detail) ? '' :
                          strval($item->detail[0]->jumlah_suara)[1]}}" class="form-control text-center"
                               onkeyup="rekap('{{$item->id}}')">
                              @endif
                          
                              @if (!empty($item->detail) && count($item->detail) > 0 && $item->detail[0]->jumlah_suara >
                              99)
                              <input type="text" name="vote-{{$item->id}}[]" pattern="[0-9]" maxlength="1"
                                value="{{ empty($item->detail) ? '' : strval($item->detail[0]->jumlah_suara)[2] }}"
                                class="form-control text-center"  onkeyup="rekap('{{$item->id}}')">
                              @endif
                              @if (count($item->detail) == 0)
                              <input type="text" name="vote-{{$item->id}}[]" pattern="[0-9]" maxlength="1"
                                class="form-control text-center"  onkeyup="rekap('{{$item->id}}')">
                              @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot style="text-transform: uppercase;">
                      <tr class="align-middle">
                        <th colspan="2" class="text-end">Jumlah Suara Partai</th>
                        <td class="text-center">
                          @if (!empty($form) && $form->jumlah_suara_sah_partai > 99)
                          <input type="text" name="partai[0]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_sah_partai)[0] }}">
                          @else
                          <input type="text" name="partai[0]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()">
                          @endif
                        </td>
                        <td class="text-center">
                          @if (!empty($form) && $form->jumlah_suara_sah_partai > 99)
                          <input type="text" name="partai[1]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_sah_partai)[2] }}">
                          @elseif(!empty($form) && $form->jumlah_suara_sah_partai > 9 && $form->jumlah_suara_sah_partai <
                            100) <input type="text" name="partai[1]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_sah_partai)[1] }}">
                            @else
                            <input type="text" name="partai[1]" pattern="[0-9]" maxlength="1"
                              class="form-control text-center"  onkeyup="rekap()">
                            @endif

                        </td>
                        <td class="text-center">
                          @if (!empty($form) && $form->jumlah_suara_sah_partai > 99)
                          <input type="text" name="partai[2]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_sah_partai)[2] }}">
                          @elseif (!empty($form) && $form->jumlah_suara_sah_partai > 9 && $form->jumlah_suara_sah_partai <
                            100) <input type="text" name="partai[2]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_sah_partai)[2] }}">
                            @else
                            <input type="text" name="partai[2]" pattern="[0-9]" maxlength="1"
                              class="form-control text-center"  onkeyup="rekap()">
                            @endif
                            <input type="hidden" name="rekapSuaraPartai[]">
                        </td>
                      </tr>
                      <tr class="align-middle">
                        <th colspan="2" class="text-end">Jumlah Total Suara Sah</th>
                        <th class="text-center" id="suara1">
                          @if (!empty($form) && $form->jumlah_suara_sah > 99)
                          {{ strval($form->jumlah_suara_sah)[0] }}
                          @else
                          0
                          @endif
                        </th>
                        <th class="text-center" id="suara2">
                          @if (!empty($form) && $form->jumlah_suara_sah > 9 && $form->jumlah_suara_sah < 100) {{
                            strval($form->jumlah_suara_sah)[0] }}
                            @elseif (!empty($form) && $form->jumlah_suara_sah > 99)
                            {{ strval($form->jumlah_suara_sah)[1] }}
                            @else
                            0
                            @endif

                        </th>
                        <th class="text-center" id="suara3">
                          @if (!empty($form) && $form->jumlah_suara_sah > 99)
                          {{ strval($form->jumlah_suara_sah)[2] }}
                          @elseif (!empty($form) && $form->jumlah_suara_sah > 9 && $form->jumlah_suara_sah < 100) {{
                            strval($form->jumlah_suara_sah)[1] }}
                            @else
                            0
                            @endif

                        </th>

                      </tr>
                      <tr class="align-middle">
                        <th colspan="2" class="text-end">Jumlah Total Suara Tidak Sah</th>
                        <td class="text-center">
                          @if (!empty($form) && $form->jumlah_suara_tidak_sah > 99)
                          <input type="text" name="suara_tidak_sah[]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_tidak_sah)[0] }}">
                          @else
                          <input type="text" name="suara_tidak_sah[]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()">
                          @endif
                        </td>
                        <td class="text-center">
                          @if (!empty($form) && $form->jumlah_suara_tidak_sah > 99)
                          <input type="text" name="suara_tidak_sah[]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_tidak_sah)[1] }}">
                          @elseif (!empty($form) && $form->jumlah_suara_tidak_sah > 9 && $form->jumlah_suara_tidak_sah <
                            100) <input type="text" name="suara_tidak_sah[]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_tidak_sah)[0] }}">
                            @else
                            <input type="text" name="suara_tidak_sah[]" pattern="[0-9]" maxlength="1"
                              class="form-control text-center"  onkeyup="rekap()">
                            @endif
                        </td>
                        <td class="text-center">
                          @if (!empty($form) && $form->jumlah_suara_tidak_sah > 99)
                          <input type="text" name="suara_tidak_sah[]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_tidak_sah)[2] }}">
                          @elseif (!empty($form) && $form->jumlah_suara_tidak_sah > 9 && $form->jumlah_suara_tidak_sah <
                            100) <input type="text" name="suara_tidak_sah[]" pattern="[0-9]" maxlength="1"
                            class="form-control text-center"  onkeyup="rekap()"
                            value="{{ strval($form->jumlah_suara_tidak_sah)[1] }}">
                            @else
                             <input type="text"
                              name="suara_tidak_sah[]" pattern="[0-9]" maxlength="1" class="form-control text-center"
                               onkeyup="rekap()">
                              @endif
                              <input type="hidden" name="rekapSuaraTidakSah[]">
                        </td>
                      </tr>
                      <tr class="align-middle">
                        <th colspan="2" class="text-end">Jumlah Total Suara</th>
                        <th class="text-center" id="totalSuara1">
                          @if (!empty($form) && $form->jumlah_suara > 99)
                          {{ strval($form->jumlah_suara)[0] }}
                          @else
                          0
                          @endif

                        </th>
                        <th class="text-center" id="totalSuara2">
                          @if (!empty($form) && $form->jumlah_suara > 9 && $form->jumlah_suara < 100) {{ strval($form->
                            jumlah_suara)[0] }}
                            @elseif (!empty($form) && $form->jumlah_suara > 99)
                            {{ strval($form->jumlah_suara)[1] }}
                            @else
                            0
                            @endif

                        </th>
                        <th class="text-center" id="totalSuara3">
                          @if (!empty($form) && $form->jumlah_suara > 99)
                          {{ strval($form->jumlah_suara)[2] }}
                          @elseif (!empty($form) && $form->jumlah_suara > 9 && $form->jumlah_suara < 100) {{ strval($form->
                            jumlah_suara)[1] }}
                            @else
                            0
                            @endif


                        </th>
                      </tr>
                    </tfoot>
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
            <form action="#" class="dropzone" id="my-awesome-dropzone" method="POST" enctype="multipart/form-data">
              <div class="fallback">
                <input name="file" type="file" multiple="multiple" onchange="uploadFile(this)">
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
      @if (!empty($form))
      <div class="card">
        <a href="#image-c1" class="text-body collbodyd collapsed" data-bs-toggle="collapse" aria-haspopup="true"
          aria-expanded="false" aria-controls="addproduct-img-collapse">
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
                <h5 class="font-size-16 mb-1">Lampiran File</h5>
                <p class="text-muted text-truncate mb-0">File form C1</p>
              </div>
              <div class="flex-shrink-0">
                <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
              </div>
            </div>
          </div>
        </a>

        <div id="image-c1" class="collapse" data-bs-parent="#addproduct-accordion">
          <div class="p-4 border-top">
            <div class="table-responsive mt-3 d-none d-md-block">
              <table class="table table-bordered">
                <thead class="text-center align-middle">
                  <tr>
                    <th rowspan="2" style="width: 100px" class="text-center">No</th>
                    <th colspan="3">Tempat Pemungutan Suara</th>
                    <th rowspan="2" style="width: 200px">File</th>
                    <th rowspan="2" style="width: 200px" class="text-center">Tanggal Upload</th>
                  </tr>
                  <tr>
                    <th class="text-center">Nama TPS</th>
                    <th>Kecamatan</th>
                    <th class="text-center">Kabupaten</th>
                  </tr>
                </thead>
                <tbody class="align-middle">
                  <tr>
                    <td class="text-center">1</td>
                    <td> {{ $form->tps->nama }} - {{ $form->tps->desa }} </td>
                    <td>{{ $form->tps->kecamatan }}</td>
                    <td class="text-center">{{ $form->tps->kabupaten }}</td>
                    <td class="text-center">
                      @if (!empty($form->file_c1))
                      <a href="{{ asset('storage/' . $form->file_c1) }}" target="_blank" class="btn btn-primary">Lihat
                        File</a>
                      @else
                      <span class="text-danger">File belum diupload</span>
                      @endif
                    </td>
                    <td class="text-center">{{ date('d/m/Y H:i', strtotime($form->created_at)) }} WIB</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
<script>
  async function rekap(id = 0) {
  const vote = [];
  const vote1 = document.querySelectorAll('input[name^="vote-' + id + '"]');
  vote1.forEach((item, index) => {
    vote.push(item.value);
  });

  if(vote.length === 3) {
      const total = vote.join('');
      let result = parseInt(total);

      if(result > 450) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Jumlah suara tidak boleh lebih dari 450!',
        }).then(() => {
          window.location.reload();
        });
        return;
      }

      const response = await fetch("{{ route('Tambah Lapor') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        body: JSON.stringify({
          calon_id: id,
          suara: result,
        })
      });
      const data = await response.json();
  }

  const suara1 = document.querySelectorAll('input[name^="vote1"]');
  const suara2 = document.querySelectorAll('input[name^="vote2"]');
  const suara3 = document.querySelectorAll('input[name^="vote3"]');
  const rekapSuaraCalon = document.querySelectorAll('input[name^="rekapSuaraCalon"]');
  let suara = [];
  let lastIndex = -1;
  suara1.forEach((item, index) => {
    suara.push(item.value);
    lastIndex = index;
  });

  const total = suara.reduce((a, b) => a + b, 0);

  const partai1 = document.querySelectorAll('input[name^="partai"]')[0].value;
  const partai2 = document.querySelectorAll('input[name^="partai"]')[1].value;
  const partai3 = document.querySelectorAll('input[name^="partai"]')[2].value;
  const rekapSuaraPartai = document.querySelectorAll('input[name^="rekapSuaraPartai"]');
  let totalSuara = 0;
  if(partai1 !== '' && partai2 !== '' && partai3 !== '') {
    const suara = [partai1, partai2, partai3].join('');
    totalSuara = total + parseInt(suara);
    rekapSuaraPartai[0].value = parseInt(suara);
    document.getElementById('suara1').innerText = totalSuara.toString().split('')[0];
    document.getElementById('suara2').innerText = totalSuara.toString().split('')[1];
    document.getElementById('suara3').innerText = totalSuara.toString().split('')[2];
    const response = await fetch("{{ route('laporSuaraPartai') }}", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      body: JSON.stringify({
        
        jumlah_suara_sah_partai: parseInt(suara),
      })
    });
  }

  const tidakSah1 = document.querySelectorAll('input[name^="suara_tidak_sah"]')[0].value || 0;
  const tidakSah2 = document.querySelectorAll('input[name^="suara_tidak_sah"]')[1].value || 0;
  const tidakSah3 = document.querySelectorAll('input[name^="suara_tidak_sah"]')[2].value  || 0;
  const reskapSuaraTidakSah = document.querySelectorAll('input[name^="rekapSuaraTidakSah"]');

    const tidakSah = [tidakSah1, tidakSah2, tidakSah3].join('');
    const totalSuaraTidakSah = parseInt(tidakSah) + totalSuara;
    reskapSuaraTidakSah[0].value = parseInt(tidakSah);
    await fetch("{{ route('laporSuaraTidakSah') }}", {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      body: JSON.stringify({
        jumlah_suara_tidak_sah: parseInt(tidakSah),
      })
    });

  const response = await fetch("{{ route('getDataForm') }}", {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });
  const data = await response.json();
  if(data) {
    if(data.data.jumlah_suara_sah > 99) {
      document.getElementById('totalSuara1').innerText = data.data.jumlah_suara.toString().split('')[0];
      document.getElementById('totalSuara2').innerText = data.data.jumlah_suara.toString().split('')[1];
      document.getElementById('totalSuara3').innerText = data.data.jumlah_suara.toString().split('')[2];
      document.getElementById('suara1').innerText = data.data.jumlah_suara_sah.toString().split('')[0];
      document.getElementById('suara2').innerText = data.data.jumlah_suara_sah.toString().split('')[1];
      document.getElementById('suara3').innerText = data.data.jumlah_suara_sah.toString().split('')[2];
    }

    if(data.data.jumlah_suara_sah > 9 && data.data.jumlah_suara_sah < 100) {
      document.getElementById('totalSuara1').innerText = 0;
      document.getElementById('totalSuara2').innerText = data.data.jumlah_suara.toString().split('')[0];
      document.getElementById('totalSuara3').innerText = data.data.jumlah_suara.toString().split('')[1];
      document.getElementById('suara1').innerText = 0;
      document.getElementById('suara2').innerText = data.data.jumlah_suara_sah.toString().split('')[0];
      document.getElementById('suara3').innerText = data.data.jumlah_suara_sah.toString().split('')[1];
    }

    if(data.data.jumlah_suara_sah < 10) {
      document.getElementById('totalSuara1').innerText = 0;
      document.getElementById('totalSuara2').innerText = 0;
      document.getElementById('totalSuara3').innerText = data.data.jumlah_suara.toString().split('')[0];
      document.getElementById('suara1').innerText = 0;
      document.getElementById('suara2').innerText = 0;
      document.getElementById('suara3').innerText = data.data.jumlah_suara_sah.toString().split('')[0];
    }
  }
}

async function uploadFile(input) {
  const formData = new FormData();
  for(const file of input.files) {
    formData.append('file', file);
  }

  const response = await fetch("{{ route('Upload File C1') }}", {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}",
    },
    body: formData
  });
  const data = await response.json();
  if(data.data) {
    Swal.fire(
      'Berhasil!',
      'File berhasil diupload.',
      'success'
    ).then(() => {
      window.location.reload();
    });
  }
}
</script>
@endsection