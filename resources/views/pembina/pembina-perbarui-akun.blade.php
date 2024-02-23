@extends('template.templatepembina')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
      <div class="container">
        <div class="admin-hp-wrap shadow" style="z-index: 10">
          <div class="daftar-eks-wrap">
            <!-- Display Notif Sukses -->
            <div class="display-notif bg-success d-none text-light mb-3" id="display-notif-perbarui">
              <div class="row">
                <div class="col-8">
                  <h4 class="m-0">Pengguna Berhasil Diperbaharui</h4>
                </div>
                <div class="col-4 text-end">
                  <button class="btn text-light" onclick="buttonDel(this)">X</button>
                </div>
              </div>
            </div>
            <div class="text-center mb-5">
              <h2>Perbarui Akun</h2>
              <hr />
            </div>
            <form action="" class="custom-form">
              <div class="row justify-content-around">
                <div class="col-sm-5">
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
                </div>
                <div class="col-sm-5 text-center">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="inputNamaPengguna" />
                    <label for="floatingInput">Nama Pengguna <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" placeholder="" name="inputPassword2" />
                    <label for="floatingInput">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" placeholder="" name="inputPassword" />
                    <label for="floatingInput">Password Baru <span class="text-danger">*</span></label>
                  </div>
                  <div class="mb-1" class="text-start">
                    <label for="">Foto Profil <span class="text-danger">*</span></label>
                  </div>
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="inputGambar" />
                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Upload</button>
                  </div>
                  <div class="mt-5 text-end">
                    <button class="btn btn-primary" onclick="displayNotif()" type="submit"><i class="bi bi-save-fill me-1"></i>Perbarui Akun</button>
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
    <script>
      function buttonDel(v) {
        $(v).parent().parent().parent().remove();
      }

      function displayNotif() {
        $("#display-notif-perbarui").removeClass("d-none");
      }
    </script>
@endsection