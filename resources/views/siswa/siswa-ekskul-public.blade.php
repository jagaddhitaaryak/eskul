@extends('template.template')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="section-hp-wrap shadow" style="z-index: 10">
                <div class="list-eks text-center mb-5">
                    <h5>Daftar Ekstrakurikuler</h5>
                    <hr />
                </div>
                <div class="row justify-content-center item-eks">
                    @forelse ($eskul as $item)
                        {{-- {{ dd($item) }} --}}
                        <div class="col-sm-4">
                            <a href="{{ url('detail', $item->id) }}">
                                <div class="list-eks-wrap">
                                    <div class="text-center mb-3">
                                        <img src="{{ asset('ekskul') }}/asset/{{ $item->gambar }}" alt=""
                                        style="object-fit: cover; width: 150px; height: 150px; border-radius: 100%" />
                                    </div>
                                    <div class="text-center">
                                        <h2>{{ $item->nama }}</h2>
                                        @php
                                            // use Carbon\Carbon;
                                            
                                            $date = \Carbon\Carbon::parse($item->jadwal_mulai);
                                            $hari = $date->locale('id')->dayName;
                                            $tanggal = $date->locale('id')->day;
                                            $bulan = $date->locale('id')->monthName;
                                            $tahun = $date->locale('id')->year;
                                            $jam = $date->locale('id')->hour;
                                            $menit = $date->locale('id')->minute;
                                            
                                            $date2 = \Carbon\Carbon::parse($item->jadwal_selesai);
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
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse

                    {{-- <div class="col-sm-4">
                        <a href="">
                            <div class="list-eks-wrap">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('ekskul') }}/asset/icon/basket-eks.png" alt=""
                                        class="img-fluid" />
                                </div>
                                <div class="text-center">
                                    <h2>Basket</h2>
                                    <p>Jum'at Jam 14:00 - 17:00</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="">
                            <div class="list-eks-wrap">
                                <div class="text-center mb-3">
                                    <img src="asset/icon/volley-eks.png" alt="" class="img-fluid" />
                                </div>
                                <div class="text-center">
                                    <h2>Voli</h2>
                                    <p>Sabtu Minggu Jam 14:00 - 17:00</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="">
                            <div class="list-eks-wrap">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('ekskul') }}/asset/icon/rohis-eks.png" alt=""
                                        class="img-fluid" />
                                </div>
                                <div class="text-center">
                                    <h2>Rohis</h2>
                                    <p>Jum'at Jam 16:00 - 17:00</p>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
