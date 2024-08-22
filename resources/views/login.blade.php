<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('logo/fav.png') }}">
    <title>SMK YPM 4 TAMAN</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <style>
        .register {
            background: #53526a;
        }

        .box {
            background: #ffffff;
            border-radius: 0.85rem;
            box-shadow: 0px 0.125rem 0.25rem rgba(0, 0, 0, 0.05);
            position: relative;
        }
    </style>
</head>

<body>
    <main>
        <div class="container">
            <section class="section">
                <header class="navbar navbar-white bg-white">
                    <div class="container">
                        <a href="#" class="navbar-brand">
                            <img src="{{ asset('logo/logo.png') }}" alt="Your Logo" height="40">
                        </a>
                    </div>
                </header>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mt-4 d-none d-md-block">
                            <img src="{{ asset('background/login.png') }}" class="img-fluid p-5 " alt="background">
                        </div>
                        <div class="col-lg-4 loginRight">
                            <div>
                                <div class="card-body mb-5">
                                    <div class="pb-2">
                                        <h2>Selamat Datang</h2>
                                        <p>Silahkan Login dengan akun Anda</p>
                                    </div>
                                    @if (session('message'))
                                        <div class="alert alert-{{ session('message')['status'] }}">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <p>{{ session('message')['desc'] }}</p>
                                        </div>
                                    @endif
                                    <form class="row g-3 mt-2" action="{{ route('login.store') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="col-12">
                                            <label for="akun"
                                                class="form-label small font-weight-bold">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="email" class="form-control" value="developer@gmail.com"
                                                    id="akun" placeholder="Enter your email" name="email"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="password"
                                                class="form-label small font-weight-bold">Password</label>
                                            <input type="password" name="password" value="Developer"
                                                class="form-control" id="password" placeholder="Enter your password"
                                                required>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-block primary-bg small mt-4" type="submit">Log
                                                In</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-5"
                                    style="position: absolute; right: 0; bottom: 0; left: 0; z-index: 1030;">
                                    <p class="text-center text-black">&copy; 2024 SMK YPM 4 TAMAN <br /> Support By
                                        Vrasmedia IT Solution</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert/sweetalert.js') }}"></script>
</body>

</html>
