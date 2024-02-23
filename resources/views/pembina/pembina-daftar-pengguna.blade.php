@extends('template.templatepembina')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
        <div class="admin-hp-wrap shadow" style="z-index: 10">
            <div class="daftar-eks-wrap">
            <div class="display-notif bg-danger d-none text-light mb-3" id="display-notif">
                <div class="row">
                <div class="col-8">
                    <h4 class="m-0">Ekskul Berhasil Di Hapus</h4>
                </div>
                <div class="col-4 text-end">
                    <button class="btn text-light" onclick="buttonDel(this)">X</button>
                </div>
                </div>
            </div>
            <div class="text-center mb-5">
                <h2>Data Nilai</h2>
                <hr />
            </div>
            <form action="" class="custom-form">
                <div class="row">
                <div class="col-sm-8">
                    <div class="table-head-admin mt-3 mb-3">
                    <label for="">
                        Show
                        <select class="" id="floatingSelect">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        </select>
                        entries
                    </label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="d-flex">
                    <select class="form-select me-2" aria-label="Default select example">
                        <option selected>Berdasarkan Ekskul</option>
                        <option value="1">-</option>
                        <option value="2">-</option>
                        <option value="3">-</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
                </div>
                <div class="" style="overflow-x: auto">
                <table id="example" class="table-bordered table table-striped" style="width: 100%">
                    <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Diperbaharui</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Pengguna</th>
                        <th>Ekskul</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dendy D'Monkey</td>
                        <td>Dendy</td>
                        <td>Basket</td>
                        <td>A</td>
                        <td>
                            <!-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" style="width: 100%" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="">AKSI</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                <a href="" class="dropdown-item"><i class="bi bi-eye-fill me-1"></i>Lihat</a>
                                </li>
                                <li>
                                <a href="" class="dropdown-item"><i class="bi bi-pencil-fill me-1"></i>Edit</a>
                                </li>
                                <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalHapus" href="#"><i class="bi bi-trash-fill me-1"></i>Hapus</a>
                                </li>
                            </ul> -->
                            <div class="d-flex justify-content-center">
                                <a href="" class="btn btn-primary  me-1"><i class="bi bi-file-text-fill me-1"></i>Lihat</a>
                                <a href="" class="btn btn-warning  me-1"><i class="bi bi-pencil-fill me-1"></i>Edit</a>
                                <button href="" class="btn btn-secondary " data-bs-toggle="modal" data-bs-target="#modalHapus"><i class="bi bi-trash-fill me-1"></i>Hapus</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="6">Data Tidak Ditemukan</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>
                    </ul>
                    </nav>
                </div>
                <div class="col-sm-6">
                    <p class="text-end">Showing 1 to 4 of 4 entries</p>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>

   <!-- Modal -->
   <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Apakah Kamu Yakin Ingin Menghapus Data Nilai Dengan Nama <strong>Aldo Mitsuko</strong> ?</div>
          <div class="modal-footer">
            <button type="button" onclick="displayNotif()" class="btn btn-primary" data-bs-dismiss="modal">Ya</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('script')
    <script>
      function buttonDel(v) {
        $(v).parent().parent().parent().remove();
      }

      function displayNotif() {
        $("#display-notif").removeClass("d-none");
      }
    </script> 
@endsection