@extends('template.template')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="section-hp-wrap shadow" style="z-index: 10">
                <div class="daftar-eks-wrap">
                    <div class="text-center mb-5">
                        <h1>Daftar Pada Ekskul {{ $ekskul->nama }}</h1>
                        <hr />
                    </div>
                    <form action="{{ url('join') }}" method="POST" class="custom-form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" value="{{ $user->name }}"
                                        id="floatingInput" placeholder="" readonly name="inputNama" />
                                    <input type="hidden" name="eskul_id" value="{{ $eskul_id }}">
                                    <label for="floatingInput">Nama Lengkap <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="kelas">
                                        @foreach ($kelas as $key => $value)
                                            <option value="{{ $value->id }}" {{ $value->id == $user->kelas ? 'selected' : '' }}>
                                                {{ $value->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Kelas <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="" value="{{ $user->whatsapp }}"
                                        name="inputNoWhatsApp" />
                                    <label for="floatingInput">Nomor WhatsApp <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" name="kelamin">
                                        <option {{ $user->kelamin == 'Laki-Laki' ? 'selected' : '' }} value="Laki-Laki">Laki-Laki</option>
                                        <option {{ $user->kelamin == 'Perempuan' ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="floatingSelect">Jenis Kelamin <span class="text-danger">*</span></label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="" value="{{ $user->alamat }}"
                                        name="inputAlamat" />
                                    <label for="floatingInput">Alamat <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="" value="{{ $user->nisn }}"
                                        name="inputNisn" />
                                    <label for="floatingInput">Nisn <span class="text-danger">*</span></label>
                                </div>
                                
                            </div>
                            <div class="col-sm-4">
                                <div class="form-floating mt-3 mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="inputAlasan" style="height: 200px"></textarea>
                                    <label for="floatingTextarea2">Alasan Mendaftar Pada Ekskul <span
                                            class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="btn-group-detail">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send-fill me-1"></i>Simpan
                                </button>
                                <a href="" class="btn btn-light ms-1"><i
                                        class="bi bi-caret-left-fill me-1"></i>KEMBALI</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
