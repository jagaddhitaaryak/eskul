@extends('template.template')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="section-hp-wrap shadow" style="z-index: 10">
                <div class="detail-eks-wrap text-center">
                    <div class="mb-3">
                        <img src="{{ asset('ekskul') }}/asset/icon/{{ $eskul->gambar }}" alt="" class="img-fluid" />
                    </div>
                    <div class="mb-5">
                        <h1>Ekskul {{ $eskul->nama }}</h1>
                        <hr />
                    </div>
                    <div class="mb-5">
                        <h4>Pengelola</h4>
                        <hr />
                        @if (count($pembina) != 0)
                            <p>Nama {{ $pembina[0]->roles }} : {{ $pembina[0]->name }}</p>
                        @endif
                        @if (count($ketua) != 0)
                            <p>Nama {{ $ketua[0]->roles }} : {{ $ketua[0]->name }}</p>
                        @endif
                    </div>
                    <div class="mb-5">
                        <h4>Jadwal Ekskul</h4>
                        <hr />
                        @php
                            // use Carbon\Carbon;
                            
                            $date = \Carbon\Carbon::parse($eskul->jadwal_mulai);
                            $hari = $date->locale('id')->dayName;
                            $tanggal = $date->locale('id')->day;
                            $bulan = $date->locale('id')->monthName;
                            $tahun = $date->locale('id')->year;
                            $jam = $date->locale('id')->hour;
                            $menit = $date->locale('id')->minute;
                            
                            $date2 = \Carbon\Carbon::parse($eskul->jadwal_selesai);
                            $hari2 = $date2->locale('id')->dayName;
                            $tanggal2 = $date2->locale('id')->day;
                            $bulan2 = $date2->locale('id')->monthName;
                            $tahun2 = $date2->locale('id')->year;
                            $jam2 = $date2->locale('id')->hour;
                            $menit2 = $date2->locale('id')->minute;
                            
                            $addition = '0';
                        @endphp
                        {{-- <p><i class="bi bi-calendar"></i> {{ $hari }}, {{ $tanggal }}
                                            {{ $bulan }}
                                            {{ $tahun }} {{ $jam }}.{{ $menit }} WIB</p> --}}
                        @if ($menit < 10 && $menit2 < 10)
                            <p>{{ $hari }} Jam
                                {{ $jam }}:{{ $addition }}{{ $menit }} -
                                {{ $jam2 }}:{{ $addition }}{{ $menit2 }}</p>
                        @elseif ($menit < 10 && $menit2 >= 10)
                            <p>{{ $hari }} Jam
                                {{ $jam }}:{{ $addition }}{{ $menit }} -
                                {{ $jam2 }}:{{ $menit2 }}</p>
                        @elseif ($menit >= 10 && $menit2 < 10)
                            <p>{{ $hari }} Jam
                                {{ $jam }}:{{ $menit }} -
                                {{ $jam2 }}:{{ $addition }}{{ $menit2 }}</p>
                        @elseif ($menit >= 10 && $menit2 >= 10)
                            <p>{{ $hari }} Jam
                                {{ $jam }}:{{ $menit }} -
                                {{ $jam2 }}:{{ $menit2 }}</p>
                        @endif
                        {{-- <p>Jum'at Jam 14:00 - 17:00</p> --}}
                    </div>
                    <div class="mb-5">
                        <h4>Tentang Ekskul</h4>
                        <hr />
                        <p>
                            {{ $eskul->deskripsi }}
                        </p>
                    </div>
                    <div class="mb-5">
                        <h4>Prestasi</h4>
                        <hr />
                        <p>
                            {{ $eskul->riwayat_prestasi }}
                        </p>
                    </div>
                    <div class="mb-5">
                        <h4>Riwayat Perlombaan</h4>
                        <hr />
                        <p>
                            {{ $eskul->riwayat_lomba }}
                        </p>
                    </div>
                    <div class="btn-group-detail">
                        <a href="/daftar/{{ $eskul->id }}" class="btn btn-primary"><i
                                class="bi bi-file-earmark-bar-graph-fill me-1"></i>DAFTAR</a>
                        <a href="/eskul" class="btn btn-light ms-1"><i class="bi bi-caret-left-fill me-1"></i>KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
