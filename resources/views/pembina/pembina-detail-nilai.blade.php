@extends('template.templatepembina')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
      <div class="container">
        <div class="admin-hp-wrap shadow" style="z-index: 10">
          <div class="row justify-content-center">
            <div class="col-sm-5 text-center">
              <img src="asset/icon/basket-eks.png" alt="" class="img-fluid mb-5" />
            </div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-4">
                  <p class="fw-bold">Nama Lengkap</p>
                </div>
                <div class="col-8">
                  <p>Aldo Mitsuko</p>
                </div>
                <div class="col-4">
                  <p class="fw-bold">Nama Pengguna</p>
                </div>
                <div class="col-8">
                  <p>Amitsuko</p>
                </div>
                <div class="col-4">
                  <p class="fw-bold">Ekskul</p>
                </div>
                <div class="col-8">
                  <p>Futsal</p>
                </div>
                <div class="col-4">
                  <p class="fw-bold">Nilai</p>
                </div>
                <div class="col-8">
                  <p>A</p>
                </div>
              </div>
              <hr />
              <div class="d-flex justify-content-end">
                <a href="" class="btn btn-primary me-1 btn-sm"><i class="bi bi-pencil-fill me-1"></i>EDIT</a>
                <button data-bs-toggle="modal" data-bs-target="#modalHapus" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill me-1"></i>HAPUS</button>
              </div>
            </div>
          </div>
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
            <div class="modal-body">Apakah Kamu Yakin Ingin Menghapus Data Nilai Dengan Nama <span class="fw-bold">Aldo Mitsuko</span> ?</div>
            <div class="modal-footer">
              <button type="button" onclick="displayNotif()" class="btn btn-primary" data-bs-dismiss="modal">Ya</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('script')
@endsection