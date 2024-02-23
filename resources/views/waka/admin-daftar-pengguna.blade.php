@extends('template.templateadmin')

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
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @elseif(\Session::has('failed'))
                            <div class="alert alert-danger">
                                {!! \Session::get('failed') !!}
                            </div>
                        @endif
                        <h2>Daftar Pengguna</h2>
                        <hr />
                    </div>
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="input-group mb-3">
                                <form class="d-flex align-items-center flex-nowrap" action="/listPenggunaAdmin">
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
                                    <th>Nama Lengkap</th>
                                    <th>Tipe</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $item)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
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
                                        <td>{{ $bulan }} {{ $tanggal }}, {{ $tahun }}
                                            {{ $jam }}:{{ $menit }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->roles }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>

                                            <div class="d-flex justify-content-center">
                                                @if ($item->roles == 'Siswa')
                                                    <a href="{{ route('detailNilaiPenggunaAdmin', $item->id) }}"
                                                        class="btn btn-primary  me-1"><i
                                                            class="bi bi-file-text-fill me-1"></i>Lihat</a>
                                                @endif
                                                <a href="{{ route('editPengguna', $item->id) }}"
                                                    class="btn btn-warning  me-1"><i
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
                                                                Pengguna ?</div>
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
                                                {{-- <button href="" class="btn btn-secondary "
                                                  data-bs-toggle="modal" data-bs-target="#modalHapus"><i
                                                      class="bi bi-trash-fill me-1"></i>Hapus</button> --}}
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
                    <h6 class="m-0 font-weight-bold text-primary">Halaman : {{ $user->currentPage() }}</h6>
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Data : {{ $user->total() }}</h6>
                    <h6 class="m-0 font-weight-bold text-primary">Data Per Halaman : {{ $user->perPage() }}</h6>
                    <br>
                    <div class="d-flex">
                        {!! $user->links() !!}
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
