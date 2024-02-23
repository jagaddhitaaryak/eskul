@extends('template.templateketua')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="text-center mb-5">
                    <h2>Tambah Anggota Baru</h2>
                    <hr />
                </div>
                <div class="daftar-eks-wrap">
                    <form method="POST" action="{{ url('insertAnggotaKetua') }}" class="custom-form">
                        <div class="row justify-content-center">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder=""
                                        name="inputNamaLengkap" />
                                    <label for="floatingInput">Nama Lengkap <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder=""
                                        name="inputUsername" />
                                    <label for="floatingInput">Username <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingInput" placeholder=""
                                        name="inputPassword" />
                                    <label for="floatingInput">Password <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="kelas">
                                        @foreach ($kelas as $key => $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == 1 ? 'selected' : '' }}>
                                                {{ $value->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Kelas <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-3 text-center">
                                <div class="mt-3">
                                    <div class="btn-group-detail-admin">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="bi bi-save-fill me-1"></i>Simpan</button>
                                        <a href="/daftarAnggota" class="btn btn-secondary ms-1"><i
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
