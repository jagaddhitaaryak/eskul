@extends('template.templateadmin')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="daftar-eks-wrap">
                    <div class="text-center mb-5">

                        <h2>Tambah Periode Baru</h2>
                        <hr />
                    </div>
                    <form method="POST" action="{{ url('insertPeriode') }}" class="custom-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder=""
                                        name="periode" />
                                    <label for="floatingInput">Periode<span
                                            class="text-danger">*</span></label>
                                </div>

                            </div>

                        </div>

                        <div class="col-sm-12 text-center">
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

                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
