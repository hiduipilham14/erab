<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="/assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $title ?> | E-RAB</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/logo/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css" />

    <!-- Vendor -->
    <link rel="stylesheet" href="/assets/vendor/libs/@form-validation/form-validation.css" />
    <link rel="stylesheet" href="assets/vendor/libs/sweetalert2/sweetalert2.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <script src="/assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->
     
    @include('sweetalert::alert')

    <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 p-0">
                <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
                    <img src="/assets/img/background_cover_login.png" alt="auth-login-cover"
                        class="img-fluid my-5 auth-illustration"
                        data-app-light-img="illustrations/auth-login-illustration-light.png"
                        data-app-dark-img="illustrations/auth-login-illustration-dark.png" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="mb-4">
                        <a href="/dashboard" class="justify-content-center app-brand-link gap-2">
                            <img src="/logo.png" width="100" height="100"
                                alt="logo" class="">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h3 class="mb-1">E-RAB</h3>
                    <p class="mb-4">Silahkan Login</p>

                    <form class="mb-3 needs-validation" novalidate action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="username" autofocus required />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <!-- <a href="#">
                                    <small>Forgot Password?</small>
                                </a> -->
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="password" aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer" id="toggle-password"><i
                                        class="ti ti-eye-off" id="eye-icon"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary d-grid w-100">Login</button>
                    </form>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>

    <!-- / Content -->

    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <script src="/assets/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('ti-eye-off');
                eyeIcon.classList.add('ti-eye');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('ti-eye');
                eyeIcon.classList.add('ti-eye-off');
            }
        });
    </script>
</body>

</html>
