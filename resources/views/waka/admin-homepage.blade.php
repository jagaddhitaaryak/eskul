@extends('template.templateadmin')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="admin-hp-wrap shadow" style="z-index: 10">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ count($ekskul) }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Ekskul Yang Aktif</h4>
                            </div>
                            <div class="mb-3">
                                <h1><i class="bi bi-clipboard-check-fill"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ count($pembina) }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Pembina Ekskul</h4>
                            </div>
                            <div class="mb-3">
                                <h1><i class="bi bi-people-fill"></i></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center admin-item-hp-wrap">
                            <div class="mb-3">
                                <h1>{{ count($ketua) }}</h1>
                            </div>
                            <div class="mb-3">
                                <h4>Ketua Ekskul</h4>
                            </div>
                            <div class="mb-3">
                                <h1><i class="bi bi-people-fill"></i></h1>
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
