@extends('templateketua.template')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
      <div class="container">
        <div class="admin-hp-wrap shadow" style="z-index: 10">
          <div class="text-center mb-5">
            <h2>Edit Anggota</h2>
            <hr />
          </div>
          <div class="daftar-eks-wrap">
            <form action="" class="custom-form">
              <div class="row justify-content-center">
                <div class="col-sm-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="inputNamaLengkap" />
                    <label for="floatingInput">Nama Lengkap <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="" name="inputNisn" />
                    <label for="floatingInput">Nisn <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="" name="inputEmail" />
                    <label for="floatingInput">Email <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="floatingInput" placeholder="" name="inputNomorHp" />
                    <label for="floatingInput">Nomor Hp <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="inputAlamat" />
                    <label for="floatingInput">Alamat <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                      <option selected>-</option>
                      <option value="1">Laki-Laki</option>
                      <option value="2">Perempuan</option>
                    </select>
                    <label for="floatingSelect">Jenis Kelamin <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                      <option selected>-</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                    <label for="floatingSelect">Kelas <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="inputJurusan" />
                    <label for="floatingInput">Jurusan <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                      <option selected>-</option>
                    </select>
                    <label for="floatingSelect">Ekskul <span class="text-danger">*</span></label>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-3 text-center">
                  <div class="mt-3">
                    <div class="btn-group-detail-admin">
                      <a href="" class="btn btn-primary"><i class="bi bi-save-fill me-1"></i>Simpan</a>
                      <a href="" class="btn btn-secondary ms-1"><i class="bi bi-caret-left-fill me-1"></i>KEMBALI</a>
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