@extends('template.templateketua')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="text-center mb-5">
                    <h2>Riwayat Absensi</h2>
                    <hr />
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        {{-- <form class="d-flex align-items-center flex-nowrap" action="/riwayatAbsen">
                            <input name="q" class="form-control" type="text" placeholder="Search"
                                aria-label="Search">
                            <button class="btn btn-sm btn-info">Search</button>
                        </form> --}}
                        <form action="{{ route('riwayatAbsen') }}">
                            <div class="mb-5 text-center">
                                {{-- <p>Ekskul yang di Kelola</p> --}}
                                <div class="mb-3">
                                    <select name="minggu" class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="1" {{ $minggu == 1 ? 'selected' : '' }}>Minggu ke-1</option>
                                        <option value="2" {{ $minggu == 2 ? 'selected' : '' }}>Minggu ke-2</option>
                                        <option value="3" {{ $minggu == 3 ? 'selected' : '' }}>Minggu ke-3</option>
                                        <option value="4" {{ $minggu == 4 ? 'selected' : '' }}>Minggu ke-4</option>
                                        <option value="5" {{ $minggu == 5 ? 'selected' : '' }}>Minggu ke-5</option>
                                        <option value="6" {{ $minggu == 6 ? 'selected' : '' }}>Minggu ke-6</option>
                                        <option value="7" {{ $minggu == 7 ? 'selected' : '' }}>Minggu ke-7</option>
                                        <option value="8" {{ $minggu == 8 ? 'selected' : '' }}>Minggu ke-8</option>
                                        <option value="9" {{ $minggu == 9 ? 'selected' : '' }}>Minggu ke-9</option>
                                        <option value="10" {{ $minggu == 10 ? 'selected' : '' }}>Minggu ke-10</option>
                                        <option value="11" {{ $minggu == 11 ? 'selected' : '' }}>Minggu ke-11</option>
                                        <option value="12" {{ $minggu == 12 ? 'selected' : '' }}>Minggu ke-12</option>
                                        <option value="13" {{ $minggu == 13 ? 'selected' : '' }}>Minggu ke-13</option>
                                        <option value="14" {{ $minggu == 14 ? 'selected' : '' }}>Minggu ke-14</option>
                                        <option value="15" {{ $minggu == 15 ? 'selected' : '' }}>Minggu ke-15</option>
                                        <option value="16" {{ $minggu == 16 ? 'selected' : '' }}>Minggu ke-16</option>
                                        <option value="17" {{ $minggu == 17 ? 'selected' : '' }}>Minggu ke-17</option>
                                        <option value="18" {{ $minggu == 18 ? 'selected' : '' }}>Minggu ke-18</option>
                                        <option value="19" {{ $minggu == 19 ? 'selected' : '' }}>Minggu ke-19</option>
                                        <option value="20" {{ $minggu == 20 ? 'selected' : '' }}>Minggu ke-20</option>
                                        <option value="21" {{ $minggu == 21 ? 'selected' : '' }}>Minggu ke-21</option>
                                        <option value="22" {{ $minggu == 22 ? 'selected' : '' }}>Minggu ke-22</option>
                                        <option value="23" {{ $minggu == 23 ? 'selected' : '' }}>Minggu ke-23</option>
                                        <option value="24" {{ $minggu == 24 ? 'selected' : '' }}>Minggu ke-24</option>
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-12">
                        <div class="text-center">
                            <h4 class="fst-italic"></h4>
                        </div>

                        <form action="">
                            <div class="mb-1">
                                <p class="fw-bold m-0">Nama Ekskul : {{ $ekskul[0]->nama }}</p>
                            </div>
                            @php
                                // echo count($tanggalAbsen)
                                if (count($tanggalAbsen) != 0) {
                                    $date = \Carbon\Carbon::parse($tanggalAbsen[0]->created_at);
                                    $hari = $date->locale('id')->dayName;
                                    $tanggal = $date->locale('id')->day;
                                    $bulan = $date->locale('id')->monthName;
                                    $tahun = $date->locale('id')->year;
                                    $jam = $date->locale('id')->hour;
                                    $menit = $date->locale('id')->minute;
                                    if ($menit < 10) {
                                        $menit = '0' . $menit;
                                    }
                                }
                            @endphp
                            <div class="mb-3">
                                @if (count($tanggalAbsen) != 0)
                                    <p class="fw-bold">Tanggal Absensi : {{ $bulan }} {{ $tanggal }},
                                        {{ $tahun }}</p>
                                @else
                                    <p class="fw-bold">Tidak ada absensi pada minggu ini</p>
                                @endif
                            </div>
                            <hr />
                            <div class="col-sm-4">
                                <div class="input-group mb-3">
                                    <form class="d-flex align-items-center flex-nowrap" action="/pendaftar">
                                        <input type="search" value="{{ old('q') }}" class="form-control" placeholder="Search Data..."
                                            aria-describedby="button-addon2" name="q" />

                                    </form>

                                </div>
                            </div>
                            <div class="mb-5 text-center">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Lengkap</th>
                                            <th scope="col">Nisn</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($absen as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->nisn }}</td>
                                                <td>{{ $item->status }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">Data tidak ditemukan</td>

                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            <h6 class="m-0 font-weight-bold text-primary">Halaman : {{ $absen->currentPage() }}</h6>
                            <h6 class="m-0 font-weight-bold text-primary">Jumlah Data : {{ $absen->total() }}</h6>
                            <h6 class="m-0 font-weight-bold text-primary">Data Per Halaman : {{ $absen->perPage() }}
                            </h6>
                            <br>
                            <div class="d-flex">
                                {!! $absen->links() !!}
                            </div>
                            <div class="d-flex justify-content-center">
                                {{-- <button type="submit" class="btn btn-primary me-1">Edit</button> --}}
                                <a href="{{ route('riwayatAbsen', ['minggu' => $minggu, 'download' => 'pdf']) }}"
                                    class="btn btn-success">Print</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
