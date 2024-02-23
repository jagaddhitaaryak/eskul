@extends('template.templatepembina')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                @if (count($user) != 0)
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @elseif(\Session::has('failed'))
                        <div class="alert alert-danger">
                            {!! \Session::get('failed') !!}
                        </div>
                    @endif
                    <form action="{{ route('detailAnggotaPembina', [$user[0]->user_id, $user[0]->ekskul_id]) }}">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                            name="periode">
                            @foreach ($periode as $key => $value)
                                <option value="{{ $value->id }}" {{ $value->id == $periode2 ? 'selected' : '' }}>
                                    {{ $value->periode }}
                                </option>
                            @endforeach
                        </select>
                        <br>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Cari</button>
                        </div>
                    </form>
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
                                        $nilai = 0;
                                        if ($jum_user == 0) {
                                            if ($nilai >= 0 && $nilai <= 59) {
                                                $nisbi = 'E';
                                            } elseif ($nilai >= 60 && $nilai <= 69) {
                                                $nisbi = 'D';
                                            } elseif ($nilai >= 70 && $nilai <= 79) {
                                                $nisbi = 'C';
                                            } elseif ($nilai >= 80 && $nilai <= 89) {
                                                $nisbi = 'B';
                                            } elseif ($nilai >= 90 && $nilai <= 100) {
                                                $nisbi = 'A';
                                            } else {
                                                $nisbi = 'Nilai tidak valid (Range 0 - 100)';
                                            }
                                        } else {
                                            $nilai = $user[0]->nilai;
                                            if ($nilai >= 0 && $nilai <= 59) {
                                                $nisbi = 'E';
                                            } elseif ($nilai >= 60 && $nilai <= 69) {
                                                $nisbi = 'D';
                                            } elseif ($nilai >= 70 && $nilai <= 79) {
                                                $nisbi = 'C';
                                            } elseif ($nilai >= 80 && $nilai <= 89) {
                                                $nisbi = 'B';
                                            } elseif ($nilai >= 90 && $nilai <= 100) {
                                                $nisbi = 'A';
                                            } else {
                                                $nisbi = 'Nilai tidak valid (Range 0 - 100)';
                                            }
                                        }
                                    @endphp
                                    <p>{{ $nilai}} ({{ $nisbi }})</p>
                                </div>
                                @if ($user[0]->roles_id == 5)
                                    <form method="POST"
                                        action="{{ route('updateNilaiAnggotaPembina', [$user[0]->user_id, $user[0]->ekskul_id, $periode2]) }}"
                                        class="custom-form">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="col-sm-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" min="0" max="100"
                                                        value="{{ $nilai }}" class="form-control"
                                                        id="floatingInput" placeholder="" name="inputNilai" />
                                                    <label for="floatingInput">Input Nilai<span
                                                            class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <button type="submit" class="btn btn-primary">Update Nilai</button>
                                            </div>
                                        </div>
                                        {{-- <div class="row justify-content-center">
                                <div class="col-sm-3 mt-5 text-center">
                                   
                                    <div class="mt-3">
                                        <div class="btn-group-detail-admin">
                                            <a href="" class="btn btn-primary"><i
                                                    class="bi bi-save-fill me-1"></i>Simpan</a>
                                            <a href="" class="btn btn-light ms-1"><i
                                                    class="bi bi-caret-left-fill me-1"></i>KEMBALI</a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                                    </form>
                                @endif
                            </div>
                            <hr />
                            <div class="d-flex justify-content-end">
                                <a href="/list_anggota_pembina" class="btn btn-secondary btn-sm"><i
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
                                    <a href="/list_anggota_pembina" class="btn btn-secondary btn-sm"><i
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
