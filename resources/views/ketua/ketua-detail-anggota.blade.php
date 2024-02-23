@extends('template.templatepembina')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                @if (count($user) != 0)
                    <div class="row justify-content-center">
                        <div class="col-sm-4 text-center">
                            <img src="{{ asset('ekskul') }}/asset/{{ $user[0]->photo }}" alt=""
                                class="img-fluid mb-5" />
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <p class="fw-bold">Nama Lengkap</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $user[0]->name }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-bold">Username</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $user[0]->username }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-bold">Ekskul</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $user[0]->nama_ekskul }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-bold">Tipe</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $user[0]->jabatan }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-bold">Nilai</p>
                                </div>
                                <div class="col-8">
                                    @php
                                        $nisbi = '';
                                        if ($user[0]->nilai >= 0 && $user[0]->nilai <= 59) {
                                            $nisbi = 'E';
                                        } elseif ($user[0]->nilai >= 60 && $user[0]->nilai <= 69) {
                                            $nisbi = 'D';
                                        } elseif ($user[0]->nilai >= 70 && $user[0]->nilai <= 79) {
                                            $nisbi = 'C';
                                        } elseif ($user[0]->nilai >= 80 && $user[0]->nilai <= 89) {
                                            $nisbi = 'B';
                                        } elseif ($user[0]->nilai >= 90 && $user[0]->nilai <= 100) {
                                            $nisbi = 'A';
                                        } else {
                                            $nisbi = 'Nilai tidak valid (Range 0 - 100)';
                                        }
                                    @endphp
                                    <p>{{ $user[0]->nilai }} ({{ $nisbi }})</p>
                                </div>

                            </div>
                            <hr />
                            <div class="d-flex justify-content-end">
                                <a href="/daftarAnggota" class="btn btn-secondary btn-sm"><i
                                        class="bi bi-caret-left-fill me-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-sm-5 text-center">
                            <img src="{{ asset('ekskul') }}/asset/{{ $ketua[0]->photo }}" alt=""
                                class="img-fluid mb-5" />
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <p class="fw-bold">Nama Lengkap</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $ketua[0]->name }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-bold">Username</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $ketua[0]->username }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-bold">Ekskul</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $ketua[0]->nama_ekskul }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-bold">Tipe</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $ketua[0]->jabatan }}</p>
                                </div>

                                <hr />
                                <div class="d-flex justify-content-end">
                                    <a href="/daftarAnggota" class="btn btn-secondary btn-sm"><i
                                            class="bi bi-caret-left-fill me-1"></i>Kembali</a>
                                </div>
                            </div>
                        </div>
                @endif
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Apakah Kamu Yakin Ingin Menghapus Ketua Dengan Nama <span class="fw-bold">Aldo
                            Mitsuko</span> ?</div>
                    <div class="modal-footer">
                        <button type="button" onclick="displayNotif()" class="btn btn-primary"
                            data-bs-dismiss="modal">Ya</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
