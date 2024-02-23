@extends('template.templateketua')

@section('content_public')
    <!-- Section Content -->

    <section class="section-hp" id="section-hp">

        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="text-center mb-5">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @elseif(\Session::has('failed'))
                        <div class="alert alert-danger">
                            {!! \Session::get('failed') !!}
                        </div>
                    @endif
                    <h2>Absen Anggota</h2>
                    <hr />
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        {{-- <form action="{{ route('kirimAbsen') }}">
                            <div class="mb-5 text-center">
                                <p>Ekskul yang di Kelola</p>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Ekstrakurikuler</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="date" class="form-control" id="exampleFormControlInput1"
                                        name="tanggal" />
                                </div>
                            </div>
                        </form> --}}
                    </div>
                    <div class="col-sm-12">
                        {{-- <div class="text-center">
                            <h4 class="fst-italic">Silahkan Pilih Ekskul</h4>
                        </div> --}}

                        {{-- <hr /> --}}
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
                                    @forelse ($anggota as $item)
                                        <form method="POST" action="{{ route('kirimAbsen') }}">
                                            @csrf
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->nisn }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio"
                                                                value=".Hadir.{{ $item->user_eskul }}" checked
                                                                name="radioAbsen{{ $loop->iteration }}"
                                                                id="flexCheckDefault1{{ $loop->iteration }}" />
                                                            <label class="form-check-label"
                                                                for="flexCheckDefault1{{ $loop->iteration }}"> Hadir
                                                            </label>
                                                        </div>
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio"
                                                                value=".Alpha.{{ $item->user_eskul }}"
                                                                name="radioAbsen{{ $loop->iteration }}"
                                                                id="flexCheckDefault2{{ $loop->iteration }}" />
                                                            <label class="form-check-label"
                                                                for="flexCheckDefault2{{ $loop->iteration }}"> Alpha
                                                            </label>
                                                        </div>
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio"
                                                                value=".Terlambat.{{ $item->user_eskul }}"
                                                                name="radioAbsen{{ $loop->iteration }}"
                                                                id="flexCheckDefault3{{ $loop->iteration }}" />
                                                            <label class="form-check-label"
                                                                for="flexCheckDefault3{{ $loop->iteration }}">
                                                                Terlambat
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                value=".Sakit / Izin.{{ $item->user_eskul }}"
                                                                name="radioAbsen{{ $loop->iteration }}"
                                                                id="flexCheckDefault4{{ $loop->iteration }}" />
                                                            <label class="form-check-label"
                                                                for="flexCheckDefault4{{ $loop->iteration }}"> Sakit
                                                                /Izin
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
