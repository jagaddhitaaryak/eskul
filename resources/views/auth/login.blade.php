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

    <style>
        .jumbotron {
            min-height: 40rem;
            background-size: cover;
            background-color: black;
            padding-top: 15rem;
            background-image: url('{{ asset('ekskul/asset/bg-1.png') }}');
            ;
        }
    </style>
    <!-- Source CSS -->
    <link rel="stylesheet" href="{{ asset('ekskul') }}/css/style_hp.css" />

    <title>Login</title>
</head>

<body>
    <!-- Section Content -->
    <section class="login-admin" id="login-admin">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-admin-wrap shadow">
                        <div class="text-center">
                            <div class="mb-3">
                                <h2>Login</h2>
                                <hr />
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" value="{{ old('username') }}" class="form-control"
                                        id="floatingInput" placeholder="" name="username" />
                                    <label for="floatingInput">Username</label>
                                </div>
                                <div class="form-floating mb-5">
                                    <input type="password" class="form-control" id="floatingInput" placeholder=""
                                        name="password" />
                                    <label for="floatingInput">Password</label>

                                    @if ($errors->has('username'))
                                    <br>
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </div>
                                    @elseif ($errors->has('password'))
                                    <br>
                                        <div class="alert alert-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-start">
                                            <a href="{{ redirect()->getUrlGenerator()->previous() }}"
                                                class="btn text-primary"><strong>Kembali</strong></a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-end">
                                            <button type="submit"
                                                class="btn btn-primary"><strong>Login</strong></button>
                                        </div>
                                    </div>
                                </div>
                                {{-- {{ dd($errors->has('username')) }} --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="footer-hp">
        <div class="text-center">
            <p>All rights reserved. Copyright © by JAGADDHITAARYAK.</p>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
