@extends('template.templateadmin')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="row justify-content-center">
                    <div class="col-sm-5 text-center">
                        <img src="{{ asset('ekskul/asset') }}/{{ $ekskul->gambar }}" alt=""
                            class="img-fluid mb-5" style="object-fit: cover; width: 200px; height: 200px; border-radius: 100%" />
                    </div>
                    <div class="col-sm-10">
                        <div class="mb-3">
                            <h5>Nama Ekstrakurikuler</h5>
                            <p class="ms-3">{{ $ekskul->nama }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Nama Pembina</h5>
                            <p class="ms-3">{{ $pembina[0]->nama }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Nama Ketua</h5>
                            <p class="ms-3">{{ $ketua[0]->nama }}</p>
                        </div>
                        @php
                            $date = \Carbon\Carbon::parse($ekskul->jadwal_mulai);
                            $hari = $date->locale('id')->dayName;
                            $tanggal = $date->locale('id')->day;
                            $bulan = $date->locale('id')->monthName;
                            $tahun = $date->locale('id')->year;
                            $jam = $date->locale('id')->hour;
                            $menit = $date->locale('id')->minute;
                            if ($menit < 10) {
                                $menit = '0' . $menit;
                            }
                            
                            $date2 = \Carbon\Carbon::parse($ekskul->jadwal_selesai);
                            $hari2 = $date2->locale('id')->dayName;
                            $tanggal2 = $date2->locale('id')->day;
                            $bulan2 = $date2->locale('id')->monthName;
                            $tahun2 = $date2->locale('id')->year;
                            $jam2 = $date2->locale('id')->hour;
                            $menit2 = $date2->locale('id')->minute;
                            if ($menit2 < 10) {
                                $menit2 = '0' . $menit2;
                            }
                            
                        @endphp
                        <div class="mb-3">
                            <h5>Jadwal Ekskul</h5>
                            <p class="ms-3">{{ $hari }} Jam {{ $jam }}.{{ $menit }} -
                                {{ $jam2 }}.{{ $menit2 }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Tentang Ekskul</h5>
                            <p class="ms-3">
                                {{ $ekskul->deskripsi }}
                            </p>
                        </div>
                        <div class="mb-5">
                            <h5>Status Ekskul</h5>
                            @if ($ekskul->status == 'aktif')
                                <div class="rounded-pill ms-3 btn bg-success text-light text-center">
                                    <p class="m-0">AKTIF</p>
                                </div>
                            @elseif($ekskul->status == 'non aktif')
                                <div class="rounded-pill ms-3 btn bg-danger text-light text-center">
                                    <p class="m-0">NON AKTIF</p>
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('editEskulAdmin', $ekskul->id) }}" class="btn btn-primary btn-sm me-1"><i
                                    class="bi bi-pencil-fill me-1"></i>EDIT</a>
                            <a href="/waka_dashboard" class="btn btn-secondary btn-sm"><i
                                    class="bi bi-caret-left-fill me-1"></i>KEMBALI KE LIST</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
