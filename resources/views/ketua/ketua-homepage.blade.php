@extends('template.templateketua')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ $tertunda }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Pendaftar Tertunda</h4>
                            </div>
                            <div class="mb-3">
                                <h1><i class="bi bi-file-earmark-bar-graph-fill"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ $terkonfirmasi }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Pendaftar Terkonfirmasi</h4>
                            </div>
                            <div class="mb-3">
                                <h1><i class="bi bi-file-earmark-bar-graph-fill"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ $disetujui }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Pendaftar Disetujui</h4>
                            </div>
                            <div class="mb-3">
                                <h1><i class="bi bi-file-earmark-bar-graph-fill"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ $ditolak }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Pendaftar Ditolak</h4>
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
