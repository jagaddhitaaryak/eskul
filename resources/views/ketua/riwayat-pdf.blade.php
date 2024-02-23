<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />

    <script type="text/javascript" language="javascript" defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" language="javascript" defer
        src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" defer
        src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Source CSS -->
    <style>
        html {
            position: relative;
        }

        body {
            background-color: whitesmoke;
            min-height: 10rem;
        }

        a {
            text-decoration: none !important;
        }

        footer {
            min-height: 5rem;
            padding: 2rem 0;
        }

        /* Custom Style Homepage.html*/

        .nav-wrap {
            background-color: white;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
        }



        .carousel h1 {
            font-size: 120px;
        }

        .carousel h5 {
            font-size: 36px;
        }

        .carousel p {
            font-size: 36px;
        }

        table,
        th,
        td {
            border: 1px solid;
        }

        .section-hp-wrap {
            width: 100%;
            min-height: 40rem;
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 3rem 3rem;
            margin-top: -10rem;
            z-index: 99;
        }

        .title-hp-wrap {
            width: 50%;
            margin: 0 auto;
        }

        .title-hp-wrap p {
            font-size: 24px;
        }

        .title-item-wrap p {
            font-size: 24px;
            color: #393f72;
        }

        .item-content {
            width: 100%;
            min-height: 10rem;
            border-radius: 1rem;
            padding: 1rem;
            border: 2px solid black;
        }

        .item-content img {
            height: 58px;
            width: auto;
        }

        .item-hp-wrap {
            margin-bottom: 10rem;
        }

        .visimisi-hp-wrap a {
            font-size: 20px;
        }

        .img-visimisi-wrap {
            padding: 2rem 0;
        }

        .carousel {
            z-index: -100;
        }

        .carousel-caption {
            bottom: 25rem;
        }

        /* Custom Style Siswa-Ekskul-Public.Html */
        .list-eks h5 {
            font-size: 36px;
            color: #23365b;
        }

        .list-eks hr {
            width: 20%;
            margin: 0 auto;
        }

        .list-eks-wrap {
            width: 100%;
            min-height: 10rem;
            border-radius: 2rem;
            border: 2px solid black;
            padding: 1rem 1rem;
        }

        .list-eks-wrap h2,
        .list-eks-wrap p {
            color: #23365b;
        }

        .item-eks .col-sm-4 {
            padding: 0 !important;
        }

        /* Custom Style Detail-ekskul-pubic.html */
        .detail-eks-wrap hr {
            width: 15%;
            border: 2px solid black;
            margin: 1rem auto;
            color: black;
        }

        .btn-group-detail {
            display: flex;
            justify-content: end;
        }

        .btn-group-detail-admin {
            display: flex;
            justify-content: center;
        }

        /* Custom Style Daftar Ekskul */
        .daftar-eks-wrap input[type="text"],
        .daftar-eks-wrap input[type="email"],
        .daftar-eks-wrap input[type="password"],
        .daftar-eks-wrap input[type="number"],
        .daftar-eks-wrap select {
            outline: none;
            border-bottom: 1px solid black;
            border-left: none;
            border-top: none;
            border-right: none;
            border-radius: 0;
        }

        /* Custom Style Daftar Admin */

        .login-admin {
            min-height: 40rem;
            background-image: url("{{ asset('asset/bg-jb.png') }}");
            background-size: cover;
            padding-top: 10%;
        }

        .login-admin-wrap {
            width: 100%;
            min-height: 10rem;
            background-color: #ffffff;
            border-radius: 1rem;
            margin: 0 auto;
            padding: 2rem;
            z-index: 10;
        }

        .login-admin-wrap input {
            outline: none;
            border-bottom: 1px solid black;
            border-left: none;
            border-top: none;
            border-right: none;
            border-radius: 0;
        }

        /* Custom Style Admin Homepage */

        .admin-hp-wrap {
            width: 100%;
            min-height: 20rem;
            background-color: #ffffff;
            border-radius: 1rem;
            padding: 3rem 3rem;
            margin-top: -10rem;
            z-index: 99;
        }

        .admin-item-hp-wrap {
            width: 100%;
            padding: 2rem;
        }

        /* Custom Style Admin  */

        .admin-hp-wrap .daftar-eks-wrap hr {
            width: 80%;
            margin: 0 auto;
        }

        /* Custom Style Admin Daftar Ekskul */
        .table-status {
            width: 100%;
            border-radius: 2rem;
            padding: 0.5rem;
        }

        .table-head-admin {
            float: left;
        }

        .display-notif {
            width: 100%;
            padding: 1rem;
            border-radius: 1rem;
        }
    </style>
    {{-- <link rel="stylesheet" href="{{ asset('ekskul') }}/css/style_hp.css" /> --}}

    <title>Ekskul SMA IT Mentari Ilmu Karawang</title>
</head>

<body>

    <div class="mb-1">
        <p class="fw-bold m-0">Nama Ekskul : {{ $ekskul[0]->nama }}</p>
    </div>
    @php
        // echo count($tanggalAbsen)
        if (count($tanggalAbsen) != 0) {
            $date = \Carbon\Carbon::parse($tanggalAbsen[0]->created_at);
            $hari = $date->locale('id')->dayName;
            $tanggal = $date->locale('id')->day;
            $bulan = $date->locale('id')->monthName;
            $tahun = $date->locale('id')->year;
            $jam = $date->locale('id')->hour;
            $menit = $date->locale('id')->minute;
            if ($menit < 10) {
                $menit = '0' . $menit;
            }
        }
    @endphp
    <div class="mb-3">
        @if (count($tanggalAbsen) != 0)
            <p class="fw-bold">Tanggal Absensi : {{ $bulan }} {{ $tanggal }},
                {{ $tahun }}</p>
        @else
            <p class="fw-bold">Tidak ada absensi pada minggu ini</p>
        @endif
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
                @forelse ($absen as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Data tidak ditemukan</td>

                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</body>

</html>
