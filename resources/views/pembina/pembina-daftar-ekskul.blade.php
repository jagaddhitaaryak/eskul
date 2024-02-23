@extends('template.templatepembina')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="daftar-eks-wrap">
                    <div class="display-notif bg-danger d-none text-light mb-3" id="display-notif">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="m-0">Ekskul Berhasil Di Hapus</h4>
                            </div>
                            <div class="col-4 text-end">
                                <button class="btn text-light" onclick="buttonDel(this)">X</button>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mb-5">
                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @elseif(\Session::has('failed'))
                        <div class="alert alert-danger">
                            {!! \Session::get('failed') !!}
                        </div>
                    @endif
                        <h2>Ekskul Yang Di Kelola</h2>
                        <hr />
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <form class="d-flex align-items-center flex-nowrap" action="/list_ekskul_pembina">
                                    <input type="search" class="form-control" placeholder="Search Data..."
                                        aria-describedby="button-addon2" name="q" />

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="" style="overflow-x: auto">
                        <table id="example" class="table-bordered table table-striped" style="width: 100%">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Diperbaharui</th>
                                    <th>Nama Ekskul</th>
                                    <th>Jadwal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ekskul as $item)
                                    {{-- {{ dd($ekskul) }} --}}
                                    @php
                                        $date = \Carbon\Carbon::parse($item->created_at);
                                        $hari = $date->locale('id')->dayName;
                                        $tanggal = $date->locale('id')->day;
                                        $bulan = $date->locale('id')->monthName;
                                        $tahun = $date->locale('id')->year;
                                        $jam = $date->locale('id')->hour;
                                        $menit = $date->locale('id')->minute;
                                        
                                        $date2 = \Carbon\Carbon::parse($item->jadwal_mulai);
                                        $hari2 = $date2->locale('id')->dayName;
                                        $tanggal2 = $date2->locale('id')->day;
                                        $bulan2 = $date2->locale('id')->monthName;
                                        $tahun2 = $date2->locale('id')->year;
                                        $jam2 = $date2->locale('id')->hour;
                                        $menit2 = $date2->locale('id')->minute;
                                        if ($menit2 < 10) {
                                            $menit2 = '0' . $menit2;
                                        }
                                        
                                        $date3 = \Carbon\Carbon::parse($item->jadwal_selesai);
                                        $hari3 = $date3->locale('id')->dayName;
                                        $tanggal3 = $date3->locale('id')->day;
                                        $bulan3 = $date3->locale('id')->monthName;
                                        $tahun3 = $date3->locale('id')->year;
                                        $jam3 = $date3->locale('id')->hour;
                                        $menit3 = $date3->locale('id')->minute;
                                        if ($menit3 < 10) {
                                            $menit3 = '0' . $menit3;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bulan }} {{ $tanggal }}, {{ $tahun }}
                                            {{ $jam }}:{{ $menit }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $hari2 }} Jam {{ $jam2 }}:{{ $menit2 }} -
                                            {{ $jam3 }}:{{ $menit3 }}</td>
                                        <td>
                                            @if ($item->status == 'aktif')
                                                <div class="table-status bg-success text-light text-center">
                                                    <p class="m-0">AKTIF</p>
                                                </div>
                                            @elseif($item->status == 'non aktif')
                                                <div class="table-status bg-danger text-light text-center">
                                                    <p class="m-0">NON AKTIF</p>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <!-- <button type="button"
                                                              class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                              style="width: 100%" data-bs-toggle="dropdown" aria-expanded="false">
                                                              <span class="">AKSI</span>
                                                          </button>
                                                          <ul class="dropdown-menu">
                                                              <li>
                                                                  <a class="dropdown-item" href="{{ route('editEskulPembina', $item->id) }}"><i
                                                                          class="bi bi-file-text-fill me-1"></i>Lihat</a>
                                                              </li>
                                                              <li>
                                                                  <a class="dropdown-item" href="{{ route('editEskulPembina', $item->id) }}"><i
                                                                          class="bi bi-pencil-fill me-1"></i>Edit</a>
                                                              </li>
                                                              <li>
                                                                  <a class="dropdown-item" data-bs-toggle="modal"
                                                                      data-bs-target="#modalHapus" href="#"><i
                                                                          class="bi bi-trash-fill me-1"></i>Hapus</a>
                                                              </li>
                                                          </ul> -->
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ url('detailEskulPembina', $item->id) }}"
                                                    class="btn btn-primary me-1"><i
                                                        class="bi bi-file-text-fill me-1"></i>Lihat</a>
                                                <a href="{{ url('editEskulPembina', $item->id) }}"
                                                    class="btn btn-warning me-1"><i
                                                        class="bi bi-pencil-fill me-1"></i>Edit</a>
                                                <button class="btn btn-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#modalHapus{{ $loop->iteration }}"><i
                                                        class="bi bi-trash-fill me-1"></i>Hapus</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalHapus{{ $loop->iteration }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">Apakah Kamu Yakin Ingin Menghapus
                                                                <strong>Basket</strong> Dari List ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="hapusAkun/{{ $item->id }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <button type="submit" onclick="displayNotif()"
                                                                        class="btn btn-primary"
                                                                        data-bs-dismiss="modal">Ya</button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tidak</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Data Tidak Ditemukan</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <h6 class="m-0 font-weight-bold text-primary">Halaman : {{ $ekskul->currentPage() }}</h6>
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Data : {{ $ekskul->total() }}</h6>
                    <h6 class="m-0 font-weight-bold text-primary">Data Per Halaman : {{ $ekskul->perPage() }}</h6>
                    <br>
                    <div class="d-flex">
                        {!! $ekskul->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function buttonDel(v) {
            $(v).parent().parent().parent().remove();
        }

        function displayNotif() {
            $("#display-notif").removeClass("d-none");
        }
    </script>
@endsection
