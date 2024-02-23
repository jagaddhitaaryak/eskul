@extends('template.template')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="section-hp-wrap shadow" style="z-index: 10">
                <div class="daftar-eks-wrap">
                    <div class="text-center mb-5">
                        <h1>Daftar Ekskul yang Dimiliki</h1>
                        <hr />
                    </div>
                    @php
                        $i = 0;
                    @endphp
                    @forelse ($ekskul as $item)
                        @php
                            $j = 0;
                        @endphp
                        <div class="item-absensi-wrap shadow">
                            <div class="mb-3">
                                <h4>Ekstrakurikuler {{ $item->nama }}</h4>
                            </div>
                            <div class="mb-3 text-primary">
                                <ul class="p-0" style="list-style: none">
                                    @php
                                        $fix = '';

                                        if (!empty($data[$i])) {
                                            for ($k = 0; $k < count($data[$i]); $k++) {
                                                // echo $k;
                                                if (!empty($data[$i])) {
                                                    $fix .= mb_substr($data[$i][$k]['status'], 0, 1) . ' ';
                                                } else {
                                                    $fix = 'Belum ada data absensi';
                                                }
                                            }
                                        } else {
                                            $fix = 'Belum ada data absensi';
                                        }
                                    @endphp
                                    <li>Kehadiran : {{ $fix }}
                                    </li>
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
                                    @endphp
                                    <li>Nilai : {{ $nisbi }}</li>
                                </ul>
                            </div>
                            @php
                                $presentase = ($diffInWeeks / 24) * 100;
                                // echo $presentase;
                            @endphp
                            <div class="mb-3">
                                <p class="text-primary">Progress: {{ $diffInWeeks }}/24 ({{ $presentase }}%)</p>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $presentase }}%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="accordion mb-3" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne{{ $loop->iteration }}" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <i class="bi bi-person-lines-fill me-1"></i>Riwayat Kehadiran Absensi
                                        </button>
                                    </h2>
                                    <div id="collapseOne{{ $loop->iteration }}" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="item-riwayat-header">
                                                <div class="row text-secondary">
                                                    <div class="col-6">
                                                        <p class="text-wrap">TANGGAL EKSKUL</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="text-wrap">STATUS PRESENSI</p>
                                                    </div>
                                                    <hr />
                                                </div>
                                            </div>
                                            <div class="item-riwayat-body">

                                                @php
                                                    $fix = '';
                                                    // dump($jum);
                                                @endphp
                                                {{-- {{ dd($jum) }} --}}
                                                @if (!empty($data[$i]))
                                                    @for ($k = 0; $k < count($data[$i]); $k++)
                                                        @if (!empty($data[$i]))
                                                            @php
                                                                $date = \Carbon\Carbon::parse($data[$i][$k]['created_at']);
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
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="text-wrap mb-1">{{ $hari }},
                                                                        {{ $tanggal }} {{ $bulan }}
                                                                        {{ $tahun }}
                                                                        {{ $jam }}.{{ $menit }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="text-wrap mb-1">{{ $data[$i][$k]['status'] }}
                                                                    </p>
                                                                </div>
                                                                <hr />
                                                            </div>
                                                        @else
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="text-wrap mb-1">-</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="text-wrap mb-1">Belum ada data absensi</p>
                                                                </div>
                                                                <hr />
                                                            </div>
                                                        @endif
                                                        {{-- {{ dd($k) }} --}}
                                                    @endfor
                                                @else
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p class="text-wrap mb-1">-</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="text-wrap mb-1">Belum ada data absensi</p>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                @endif
                                                @php
                                                    $i++;
                                                @endphp
                                                {{-- <div class="row">
                                                    <div class="col-6">
                                                        <p class="text-wrap mb-1">Rabu, 4 Oktober 2023 14.00-17.00</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="text-wrap mb-1">Hadir</p>
                                                    </div>

                                                    <hr />
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                {{-- {{ dd($item) }} --}}
                                <a href="{{ url('detailEkskulSiswa', $item->ekskul_id) }}"
                                    class="btn btn-lg btn-primary w-100"><i class="bi bi-person-fill-check me-1"></i>Detail
                                    Ekskul</a>
                            </div>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
