@extends('template.templatepembina')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
      <div class="container">
        <div class="admin-hp-wrap shadow" style="z-index: 10">
          <div class="daftar-eks-wrap">
            <div class="text-center mb-5">
              <h2>Edit Ketua</h2>
              <hr />
            </div>
            <form action="" class="custom-form">
              <div class="row justify-content-center">
                <div class="col-sm-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="inputNamaDepan" />
                    <label for="floatingInput">Nama Depan <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="inputNamaTengah" />
                    <label for="floatingInput">Nama Tengah <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="inputNamaBelakang" />
                    <label for="floatingInput">Nama Belakang <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="inputNamaPengguna" />
                    <label for="floatingInput">Nama Pengguna <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                      <option selected>-</option>
                    </select>
                    <label for="floatingSelect">Ekskul <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="inputNilai" />
                    <label for="floatingInput">Nilai <span class="text-danger">*</span></label>
                  </div>

                  <div class="mb-1">
                    <label for="">Foto Profil <span class="text-danger">*</span></label>
                  </div>
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="inputGambar" />
                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Upload</button>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-3 mt-5 text-center">
                  <img class="img-fluid mt-3 shadow-sm" src="asset/profile.png" alt="" srcset="" style="border-radius: 10rem; width: 50%; height: auto" />
                  <div class="mt-3">
                    <div class="btn-group-detail-admin">
                      <a href="" class="btn btn-primary"><i class="bi bi-save-fill me-1"></i>Simpan</a>
                      <a href="" class="btn btn-light ms-1"><i class="bi bi-caret-left-fill me-1"></i>KEMBALI</a>
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