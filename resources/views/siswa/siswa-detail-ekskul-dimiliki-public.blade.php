@extends('template.template')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="section-hp-wrap shadow" style="z-index: 10">
                <div class="detail-eks-wrap text-center">
                    <div class="mb-3">
                        <img src="asset/icon/basket-eks.png" alt="" class="img-fluid" />
                    </div>
                    <div class="mb-5">
                        <h1>{{ $ekskul->nama }}</h1>
                        <hr />
                    </div>
                    <div class="mb-5">
                        <h4>Pengelola</h4>
                        <hr />
                        <p>Nama Pembina : {{ $pembina[0]->name }}</p>
                        <p>Nama ketua : {{ $ketua[0]->name }}</p>
                    </div>
                    <div class="mb-5">
                        @php
                            
                            $date2 = \Carbon\Carbon::parse($ekskul->jadwal_mulai);
                            $hari2 = $date2->locale('id')->dayName;
                            $tanggal2 = $date2->locale('id')->day;
                            $bulan2 = $date2->locale('id')->monthName;
                            $tahun2 = $date2->locale('id')->year;
                            $jam2 = $date2->locale('id')->hour;
                            $menit2 = $date2->locale('id')->minute;
                            if ($menit2 < 10) {
                                $menit2 = '0' . $menit2;
                            }
                            
                            $date3 = \Carbon\Carbon::parse($ekskul->jadwal_selesai);
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
                        <h4>Jadwal Ekskul</h4>
                        <hr />
                        <p>{{ $hari2 }} Jam {{ $jam2 }}:{{ $menit2 }} -
                            {{ $jam3 }}:{{ $menit3 }}</p>
                    </div>
                    <div class="mb-5">
                        <h4>Tentang Ekskul</h4>
                        <hr />
                        <p>
                            {{ $ekskul->deskripsi }}
                        </p>
                    </div>
                    <div class="mb-5">
                        <div class="w-100 shadow p-5" style="border-radius: 1rem">
                            <div class="mb-3">
                                <h4>Daftar Anggota</h4>
                                <hr />
                            </div>
                            <form action="" class="custom-form">
                                <div class="row">
                                    <div class="col-sm-8">
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
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="input-group mb-3">
                                            <input type="search" class="form-control" placeholder="Search Data..."
                                                aria-describedby="button-addon2" />
                                        </div>
                                    </div>
                                </div>
                                <div class="" style="overflow-x: auto">
                                    <table id="example" class="text-center table-bordered table table-striped"
                                        style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Lengkap</th>
                                                <th>Kelas - Jurusan</th>
                                                <th>Jabatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @forelse ($anggota as $item)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>{{ $item->roles }}</td>
                                        </tr>
                                          @empty
                                          <tr>
                                            <td class="text-center" colspan="7">Data Tidak Ditemukan</td>
                                        </tr>
                                          @endforelse
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
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
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="btn-group-detail">
                        <a href="/siswa_dashboard" class="btn btn-light ms-1"><i class="bi bi-caret-left-fill me-1"></i>KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
