@extends('template.templateketua')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="daftar-eks-wrap">
                    <!-- Display Notif Hapus -->
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

                    <!-- Display Notif Edit -->
                    <div class="display-notif bg-primary d-none text-light mb-3" id="display-notif-edit">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="m-0">Data Pengguna Berhasil Diperbarui</h4>
                            </div>
                            <div class="col-4 text-end">
                                <button class="btn text-light" onclick="buttonDel(this)">X</button>
                            </div>
                        </div>
                    </div>

                    <!-- Display Nptif Tambah -->
                    <div class="display-notif bg-success d-none text-light mb-3" id="display-notif-tambah">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="m-0">Pengguna Berhasil Ditambahkan</h4>
                            </div>
                            <div class="col-4 text-end">
                                <button class="btn text-light" onclick="buttonDel(this)">X</button>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mb-5">
                        <h2>List Anggota Aktif</h2>
                        <hr />
                    </div>
                    {{-- <form action="" class="custom-form"> --}}
                    <div class="row">
                        {{-- <div class="col-sm-8">
                            <div class="table-head-admin mt-3 mb-3">
                                <label for="">
                                    Show
                                    <select class="" id="floatingSelect">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    entries
                                </label>
                            </div>
                        </div> --}}
                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <form class="d-flex align-items-center flex-nowrap" action="/daftarAnggota">
                                    <input type="search" class="form-control" placeholder="Search Data..."
                                        aria-describedby="button-addon2" name="q" />

                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="" style="overflow-x: auto">
                        <table id="example" class="text-center table-bordered table table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Diperbaharui</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nisn</th>
                                    <th>Status</th>
                                    <th>Kelas - Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($anggota as $item)
                                    @php
                                        $date = \Carbon\Carbon::parse($item->created_at);
                                        $hari = $date->locale('id')->dayName;
                                        $tanggal = $date->locale('id')->day;
                                        $bulan = $date->locale('id')->monthName;
                                        $tahun = $date->locale('id')->year;
                                        $jam = $date->locale('id')->hour;
                                        $menit = $date->locale('id')->minute;
                                        if ($menit < 10) {
                                            $menit = '0' . $menit;
                                        }
                                    @endphp
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $bulan }} {{ $tanggal }}, {{ $tahun }}
                                            {{ $jam }}:{{ $menit }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->kelamin }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->kelas }}</td>
                                        <td>
                                            <div class="">

                                                <a href="{{ route('detailAnggotaKetua', [$item->user_id, $ekskul[0]->id]) }}"
                                                    class="btn btn-primary w-100 me-1"><i
                                                        class="bi bi-file-text-fill me-1"></i>Lihat</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">Data Tidak Ditemukan</td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <h6 class="m-0 font-weight-bold text-primary">Halaman : {{ $anggota->currentPage() }}</h6>
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Data : {{ $anggota->total() }}</h6>
                    <h6 class="m-0 font-weight-bold text-primary">Data Per Halaman : {{ $anggota->perPage() }}</h6>
                    <br>
                    <div class="d-flex">
                        {!! $anggota->links() !!}
                    </div>
                    </form>
                    {{-- </div> --}}
                </div>
            </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Apakah Kamu Yakin Ingin Menghapus Anggota ini ?</div>
                <div class="modal-footer">
                    <button type="button" onclick="displayNotif()" class="btn btn-primary"
                        data-bs-dismiss="modal">Ya</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>
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
