@extends('template.templateketua')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
      <div class="container">
        <div class="admin-hp-wrap shadow" style="z-index: 10">
          <div class="text-center mb-5">
            <h2>Laporan Absensi</h2>
            <hr />
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8">
              <form action="">
                <div class="mb-5 d-flex justify-content-center">
                  <div class="me-3 w-100">
                    <select class="form-select" aria-label="Default select example">
                      <option selected>Ekstrakurikuler</option>
                    </select>
                  </div>
                  <div class="me-3 w-100">
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal" />
                  </div>
                  <div class="mb-3">
                    <button type="button" class="btn btn-primary w-100">Cari</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-sm-12">
              <div class="text-center">
                <h4 class="fst-italic">Silahkan Pilih Ekskul</h4>
              </div>

              <form action="">
                <div class="mb-1">
                  <p class="fw-bold m-0">Nama Ekskul : Basket</p>
                </div>
                <div class="mb-1">
                  <p class="fw-bold m-0">Tanggal Absensi : Dec 25, 2022</p>
                </div>
                <div class="mb-3">
                  <p class="fw-bold">Total Absensi : 1</p>
                </div>
                <hr />
                <div class="mb-5 text-center">
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Nisn</th>
                        <th scope="col">Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>1234567890</td>
                        <td>Hadir</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary me-1">Edit</button>
                  <button type="submit" class="btn btn-success">Print</button>
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