@extends('template.template')

@section('content_public')
    <!-- Section Content -->
    <section class="section-hp" id="section-hp">
        <div class="container">
            <div class="section-hp-wrap shadow" style="z-index: 10">
                <div class="text-center mb-5">
                    <div class="mb-5">
                        <img class="img-fluid" src="https://mentariilmu.sch.id/wp-content/themes/yapmi/assets/img/favicon.ico"
                            alt="" srcset="" />
                    </div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    {{-- {{ dd(Auth::user()) }} --}}
                    <div class="mb-3 title-hp-wrap">
                        <p>Selamat Datang di Sistem Informasi Ekstrakurikuler SMA IT Mentari Ilmu Karawang</p>
                    </div>
                </div>
                <div class="item-hp-wrap">
                    <div class="mb-5 text-center title-item-wrap">
                        <p>Manfaat Kamu Ikut Ekstrakurikuler</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 mb-3">
                            <div class="item-content">
                                <div class="mb-3">
                                    <img src="{{ asset('ekskul') }}/asset/icon/Group.png" alt="" />
                                </div>
                                <div class="mb-3">
                                    <h5>Dapat Mengasah Skill dan Bakat</h5>
                                </div>
                                <p>mengembangkan dan meningkat bakat kamu agar semakin berbakat</p>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="item-content">
                                <div class="mb-3">
                                    <img src="{{ asset('ekskul') }}/asset/icon/game-icons_brain.png" alt="" />
                                </div>
                                <div class="mb-3">
                                    <h5>Dapat Mengasah Skill dan Bakat</h5>
                                </div>
                                <p>mengembangkan dan meningkat bakat kamu agar semakin berbakat</p>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="item-content">
                                <div class="mb-3">
                                    <img src="{{ asset('ekskul') }}/asset/icon/fa6-solid_people-carry-box.png"
                                        alt="" />
                                </div>
                                <div class="mb-3">
                                    <h5>Dapat Mengasah Skill dan Bakat</h5>
                                </div>
                                <p>mengembangkan dan meningkat bakat kamu agar semakin berbakat</p>
                            </div>
                        </div>
                        <div class="col-sm-3 mb-3">
                            <div class="item-content">
                                <div class="mb-3">
                                    <img src="{{ asset('ekskul') }}/asset/icon/fluent_people-add-24-regular.png"
                                        alt="" />
                                </div>
                                <div class="mb-3">
                                    <h5>Dapat Mengasah Skill dan Bakat</h5>
                                </div>
                                <p>mengembangkan dan meningkat bakat kamu agar semakin berbakat</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visimisi-hp-wrap">
                    <div class="container">
                        <div class="row mb-5">
                            <div class="col-sm-6">
                                <div class="text-center img-visimisi-wrap">
                                    <img src="{{ asset('ekskul') }}/asset/fotovisimisi.png" class="img-fluid"
                                        alt="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <h5>VISI</h5>
                                </div>
                                <div class="mb-3">
                                    <p>Menjadi lembaga pendidikan terbaik yang mampu melahirkan lulusan yang unggul, mandiri
                                        dan berkepribadian islam.</p>
                                </div>
                                <div class="mb-3">
                                    <h5>MISI</h5>
                                </div>
                                <div class="mb-3">
                                    <p>
                                        Mewujudkan lulusan yang siap memasuki jenjang pendidikan selanjutnya, membentuk
                                        kepribadian yang amanah dan komunikatif, membentuk pribadi yang berwawasan
                                        lingkungan, mengembangkan kecakapan abad 21 dan literasi,
                                        melatih kemampuan kewirausahaan siswa melalui program-program enterpreneurship,
                                        melatih kemampuan leadership siswa melalui program-program kepemimpinan, membentuk
                                        pribadi yang unggul dan mandiri, mewujudkan pribadi
                                        yang unggul dan mandiri, mewujudkan pribadi yang lurus aqidahnya, benar ibadahnya,
                                        dan baik akhlaknya, menyelenggarakan layanan pendidikan islam yang prima berbasis
                                        IT, mewujudkan generasi qurani melalui program tahsin
                                        tahfidz,.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="/eskul">cari ekstrakurikuler <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
