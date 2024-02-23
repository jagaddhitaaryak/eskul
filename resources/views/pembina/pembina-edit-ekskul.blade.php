@extends('template.templatepembina')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="daftar-eks-wrap">
                    <div class="text-center mb-5">
                        <h2>Edit Ekskul</h2>
                        <hr />
                    </div>
                    <form method="POST" enctype="multipart/form-data" action="{{ url('updateEskulPembina', $ekskul->id) }}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-11">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="{{ $ekskul->nama }}" class="form-control"
                                                id="floatingInput" placeholder="" name="inputNamaEkstrakurikuler" />
                                            <label for="floatingInput">Nama Ekstrakurikuler <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder=""
                                                value="{{ $ekskul->riwayat_prestasi }}" name="prestasi" />
                                            <label for="floatingInput">Riwayat Prestasi<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder=""
                                                value="{{ $ekskul->riwayat_lomba }}" name="lomba" />
                                            <label for="floatingInput">Riwayat Perlomban<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        {{-- {{ dd($ekskul->pembina) }} --}}
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelectNamaPembina"
                                                aria-label="Floating label select example" name="pembina">
                                                <option>Select Item</option>
                                                @foreach ($pembina as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $ekskul->pembina == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelectNamaPembina">Nama Pembina <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="floatingSelectNamaKetua"
                                                aria-label="Floating label select example" name="ketua">
                                                <option>Select Item</option>
                                                @foreach ($ketua as $key => $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $ekskul->ketua == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="floatingSelectNamaKetua">Nama Ketua <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="form-floating mb-3 me-3">
                                                <input type="datetime-local" class="form-control" id="floatingInput"
                                                    value="{{ $ekskul->jadwal_mulai }}" placeholder=""
                                                    name="inputJadwalMulai" />
                                                <label for="floatingInput">Jadwal Mulai<span
                                                        class="text-danger">*</span></label>
                                            </div>
                                            <h1 class="me-3">-</h1>
                                            <div class="form-floating mb-3">
                                                <input type="datetime-local" class="form-control" id="floatingInput"
                                                    placeholder="" value="{{ $ekskul->jadwal_selesai }}"
                                                    name="inputJadwalSelesai" />
                                                <label for="floatingInput">Jadwal Selesai<span
                                                        class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="floatingSelectStatus"
                                            aria-label="Floating label select example" name="status">
                                            <option selected>-</option>
                                            <option value="{{ $ekskul->status }}"
                                                {{ $ekskul->status == 'aktif' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="{{ $ekskul->status }}"
                                                {{ $ekskul->status == 'non aktif' ? 'selected' : '' }}>
                                                Non Aktif
                                            </option>
                                        </select>
                                        <label for="floatingSelectStatus">Status <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="mb-1">
                                        <label for="">Foto Profil <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                            name="inputGambar" />

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTentang" name="deskripsi" style="height: 300px">{{ $ekskul->deskripsi }}</textarea>
                                        <label for="floatingTentang">Tentang Ekskul <span
                                                class="text-danger">*</span></label>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-3 mt-5 text-center">
                                        <img class="img-fluid mt-3 shadow-sm"
                                            src="{{ asset('ekskul/asset/icon') }}/{{ $ekskul->gambar }}" alt=""
                                            srcset="" style="border-radius: 10rem; width: 50%; height: auto" />
                                        <div class="mt-3">
                                            <div class="btn-group-detail-admin">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="bi bi-save-fill me-1"></i>Simpan</button>
                                                <a href="/pembina_dashboard" class="btn btn-light ms-1"><i
                                                        class="bi bi-caret-left-fill me-1"></i>KEMBALI</a>
                                            </div>
                                        </div>
                                    </div>
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
