<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />

    <script type="text/javascript" language="javascript" defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" language="javascript" defer
        src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" defer
        src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Source CSS -->
    <link rel="stylesheet" href="{{ asset('ekskul') }}/css/style_hp.css" />

    <title>Ekskul SMA IT Mentari Ilmu Karawang</title>
</head>

<body>
    <!-- Jumbotron -->
    <div class="jumbotron" id="jumbotron">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <h1 class="text-light text-wrap text-center">Sistem Informasi Ekstrakurikuler SMA IT Mentari Ilmu
                        Karawang</h1>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light">
        <div class="container nav-wrap shadow">
            <a class="navbar-brand" href="#">Ekskul SMA IT Mentari Ilmu Karawang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="mx-auto"></div>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><img class="me-1"
                                style="border-radius: 10rem" src="asset/profile.png" alt=""
                                srcset="" />Hello, Guru</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                                </a>
                                {{-- <a class="dropdown-item" href="#"><i
                                        class="bi bi-box-arrow-right me-1"></i>Logout</a> --}}

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                        <h2>Nama Kelas</h2>
                        <h3>{{ $kelas[0]->nama }}</h3>
                        <hr />
                    </div>
                    <form action="{{ url('guru_dashboard') }}">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="periode">
                            @foreach ($periode as $key => $value)
                                <option value="{{ $value->id }}" {{ $value->id == $periode2 ? 'selected' : '' }}>
                                    {{ $value->periode }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" value="{{ $q }}">
                        <br>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Cari</button>
                        </div>
                    </form>
                    <form action="" class="custom-form">
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
                            <div class="">
                                <div class="input-group mb-3">
                                    <form class="d-flex align-items-center flex-nowrap" action="/guru_dashboard">
                                        <input type="search" class="form-control" placeholder="Search Data..."
                                            aria-describedby="button-addon2" name="q" value="{{ $q }}"/>
                                        <input type="hidden" value="{{ $periode2 }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="" style="overflow-x: auto">
                            <table id="example" class="text-center table-bordered table table-striped"
                                style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Diperbaharui</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nama Ekskul</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Nisn</th>
                                        <th>Nilai</th>
                                        <th>Grade</th>
                                        <th>Periode</th>
                                        <th>Kelas - Jurusan</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($siswa as $item)
                                        @php
                                            $nisbi = '';
                                            if ($item->nilai >= 0 && $item->nilai <= 59) {
                                                $nisbi = 'E';
                                            } elseif ($item->nilai >= 60 && $item->nilai <= 69) {
                                                $nisbi = 'D';
                                            } elseif ($item->nilai >= 70 && $item->nilai <= 79) {
                                                $nisbi = 'C';
                                            } elseif ($item->nilai >= 80 && $item->nilai <= 89) {
                                                $nisbi = 'B';
                                            } elseif ($item->nilai >= 90 && $item->nilai <= 100) {
                                                $nisbi = 'A';
                                            } else {
                                                $nisbi = 'Nilai tidak valid (Range 0 - 100)';
                                            }

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
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $bulan }} {{ $tanggal }}, {{ $tahun }}
                                                {{ $jam }}:{{ $menit }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->ekskul }}</td>
                                            <td>{{ $item->kelamin }}</td>
                                            <td>{{ $item->nisn }}</td>
                                            <td>{{ $item->nilai }}</td>
                                            <td>{{ $nisbi }}</td>
                                            <td>{{ $item->periode }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            {{-- <td>
                                                <button type="button"
                                                    class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                    style="width: 100%" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <span class="">AKSI</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="" class="dropdown-item"><i
                                                                class="bi bi-eye-fill me-1"></i>Lihat</a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="dropdown-item"><i
                                                                class="bi bi-pencil-fill me-1"></i>Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#modalHapus" href="#"><i
                                                                class="bi bi-trash-fill me-1"></i>Hapus</a>
                                                    </li>
                                                </ul>
                                            </td> --}}
                                        </tr>
                                    @empty

                                        <tr>
                                            <td class="text-center" colspan="7">Data Tidak Ditemukan</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <h6 class="m-0 font-weight-bold text-primary">Halaman : {{ $siswa->currentPage() }}</h6>
                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Data : {{ $siswa->total() }}</h6>
                        <h6 class="m-0 font-weight-bold text-primary">Data Per Halaman : {{ $siswa->perPage() }}</h6>
                        <br>
                        <div class="d-flex">
                            {!! $siswa->links() !!}
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-6">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-end">Showing 1 to 4 of 4 entries</p>
                            </div>
                        </div> --}}
                    </form>
                </div>
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

    <!-- footer -->
    <footer class="footer-hp">
        <div class="text-center">
            <p>All rights reserved. Copyright © by JAGADDHITAARYAK.</p>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        function buttonDel(v) {
            $(v).parent().parent().parent().remove();
        }

        function displayNotif() {
            $("#display-notif").removeClass("d-none");
        }
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
