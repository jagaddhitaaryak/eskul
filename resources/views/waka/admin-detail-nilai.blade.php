@extends('template.templateadmin')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                @forelse ($ekskul as $item)
                    <div class="row justify-content-center">
                        <div class="col-sm-5 text-center">
                            <img src="{{ asset('ekskul') }}/asset/{{ $item->ekskul_image }}" alt="" class="img-fluid mb-5" />
                        </div>
                        <div class="col-sm-10">
                            <div class="row">

                                <div class="col-4">
                                    <p class="fw-bold">Nama Lengkap</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $item->user_name }}</p>
                                </div>
                                
                                <div class="col-4">
                                    <p class="fw-bold">Ekskul</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $item->ekskul_name }}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-bold">Nilai</p>
                                </div>
                                <div class="col-8">
                                    <p>{{ $item->nilai }}</p>
                                </div>
                            </div>
                            <hr />

                        </div>
                    </div>
                @empty
                @endforelse
                <div class="d-flex justify-content-end mb-3">
                    <a href="/listPenggunaAdmin" class="btn btn-primary btn-sm"><i class="bi bi-caret-left-fill me-1"></i>KEMBALI</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
