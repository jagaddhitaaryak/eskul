@extends('template.templatepembina')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ count($anggota) }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Anggota</h4>
                            </div>
                            <div class="mb-3">
                                <h1><i class="bi bi-list-task"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ count($ketua2) }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Jumlah Ketua</h4>
                            </div>
                            <div class="mb-3">
                                <h1><i class="bi bi-people-fill"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ count($pendaftar) }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Pendaftar</h4>
                            </div>
                            <div class="mb-3">
                                <h1><i class="bi bi-file-earmark-bar-graph-fill"></i></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
@endsection
