<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Login - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('/')}}assets/img/favicon.png" rel="icon">
    <link href="{{asset('/')}}assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('/')}}assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{asset('/')}}assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('/')}}assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-0">

                                <!-- <img src="{{asset('/')}}assets/img/lutim.png" alt="" style="width: 50px;"> -->
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <!-- <span class="d-none d-lg-block">KESBANGPOL</span> -->
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-4">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <div class="d-flex justify-content-center align-items-center"
                                            style="gap: 10px; margin-top: 20px;">
                                            <img src="{{ asset('/') }}assets/img/lutim.png" alt="" style="width: 70px;">
                                            <img src="{{ asset('/') }}assets/img/juara2.png" alt=""
                                                style="width: 70px;">
                                        </div>
                                        <h5 class="card-title text-center pb-0 fs-4">KESBANGPOL</h5>
                                        <p class="text-center small">Silahkan Masukan username & password</p>
                                    </div>

                                    @if (session()->has('loginError'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Oppss!</strong> {{ session('loginError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                    @endif
                                    <form class="row g-3 needs-validation" novalidate action="{{url('/login')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Username</label>
                                            <input type="text"
                                                class="form-control @error('user_name') is-invalid @enderror"
                                                name="user_name" placeholder="username" autofocus>
                                            @error('user_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 form-password-toggle">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" for="password">Password</label>
                                                <a href="auth-forgot-password-basic.html">
                                                    <small>Forgot Password?</small>
                                                </a>
                                            </div>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="password" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        class="bx bx-hide"></i></span>
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember-me">
                                                <label class="form-check-label" for="remember-me">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://bootstrapmade.com/">DISKOMINFO-SP</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('/')}}assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/chart.js/chart.umd.js"></script>
    <script src="{{asset('/')}}assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/quill/quill.js"></script>
    <script src="{{asset('/')}}assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{asset('/')}}assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{asset('/')}}assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('/')}}assets/js/main.js"></script>

</body>

</html>