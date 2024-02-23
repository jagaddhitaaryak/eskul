@extends('template.templateadmin')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="daftar-eks-wrap">
                    <div class="text-center mb-5">

                        <h2>Tambah Ekskul Baru</h2>
                        <hr />
                    </div>
                    <form method="POST" action="{{ url('insertEkskulAdmin') }}" class="custom-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder=""
                                        name="inputNamaEkstra" />
                                    <label for="floatingInput">Nama Ekstrakurikuler<span
                                            class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder=""
                                        name="prestasi" />
                                    <label for="floatingInput">Riwayat Prestasi<span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder=""
                                        name="lomba" />
                                    <label for="floatingInput">Riwayat Perlombaan<span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="inputNamaPembina" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        @foreach ($pembina as $key => $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Nama Pembina <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-4">
                                    <select class="form-select" id="floatingSelect2" name="inputNamaKetua"
                                        aria-label="Floating label select example">
                                        @foreach ($ketua as $key => $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect2">Nama Ketua <span class="text-danger">*</span></label>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="form-floating mb-3 me-3">
                                        <input type="datetime-local" class="form-control" id="floatingInput" placeholder=""
                                            name="inputJadwalMulai" />
                                        <label for="floatingInput">Jadwal Mulai<span class="text-danger">*</span></label>
                                    </div>
                                    <h1 class="me-3">-</h1>
                                    <div class="form-floating mb-3">
                                        <input type="datetime-local" class="form-control" id="floatingInput" placeholder=""
                                            name="inputJadwalSelesai" />
                                        <label for="floatingInput">Jadwal Selesai<span class="text-danger">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="status" class="form-select" id="floatingSelect3"
                                    aria-label="Floating label select example">
                                    <option value="aktif" selected>Aktif</option>
                                    <option value="non aktif">Non Aktif</option>
                                </select>
                                <label for="floatingSelect3">Status<span class="text-danger">*</span></label>
                            </div>
                            <div class="mb-1">
                                <label for="">Logo Ekskul <span class="text-danger">*</span></label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="inputGambar" />

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-floating mt-3 mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="inputDeskripsi"
                                    style="height: 200px"></textarea>
                                <label for="floatingTextarea2">Tentang Ekskul <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-sm-3 text-center">
                            {{-- <img class="img-fluid mt-3 shadow-sm" src="{{ asset('ekskul') }}/asset/profile.png" alt="" srcset=""
                                    style="border-radius: 10rem; width: 100%; height: auto" /> --}}
                            <div class="mt-3">
                                <div class="btn-group-detail-admin">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="bi bi-save-fill me-1"></i>Simpan</button>
                                    {{-- <a href="" class="btn btn-primary"><i
                                                class="bi bi-save-fill me-1"></i>Simpan</a> --}}
                                    <a href="/daftarEkskul" class="btn btn-light ms-1"><i
                                            class="bi bi-caret-left-fill me-1"></i>KEMBALI</a>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
