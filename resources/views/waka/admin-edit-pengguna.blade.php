@extends('template.templateadmin')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="daftar-eks-wrap">
                    <div class="text-center mb-5">
                        <h2>Edit Pengguna</h2>
                        <hr />
                    </div>
                    <form method="POST" action="{{ route('updatePengguna', $user->id) }}" class="custom-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-sm-6">

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder=""
                                        name="inputNamaPengguna" value="{{ $user->name }}" />
                                    <label for="floatingInput">Nama Pengguna <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder=""
                                        name="inputUsernaamePengguna" value="{{ $user->username }}" />
                                    <label for="floatingInput">Email<span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="status"
                                        aria-label="Floating label select example">
                                        <option value="Aktif" {{ $user->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="Nonaktif" {{ $user->status == 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                                    </select>
                                    <label for="floatingSelect">Status <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect" name="role"
                                        aria-label="Floating label select example">
                                        @foreach ($roles as $key => $value)
                                            <option value="{{ $value->id }}"
                                                {{ $user->roles == $value->id ? 'selected' : '' }}>
                                                {{ $value->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Tipe <span class="text-danger">*</span></label>
                                </div>

                                <div class="mb-1">
                                    <label for="">Foto Profil <span class="text-danger">*</span></label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="inputGambar" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-3 text-center">
                                <img class="img-fluid mt-3 shadow-sm" src="{{ asset('ekskul') }}/asset/{{ $user->photo }}"
                                    alt="" srcset="" style="border-radius: 10rem; width: 100%; height: auto" />
                                <div class="mt-3">
                                    <div class="btn-group-detail-admin">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="bi bi-save-fill me-1"></i>Simpan</button>
                                        <a href="/listPenggunaAdmin" class="btn btn-light ms-1"><i
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
