<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../">
    <title>Login Sistema Colegio</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('metronic/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('metronic/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                style="background-color: #F2C98A">
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <a href="../../demo1/dist/index.html" class="py-9 mb-5">
                            <img alt="Logo" src="metronic/media/logos/logo-2.svg" class="h-60px" />
                        </a>
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">BIENVENIDO </h1>
                    </div>
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url(metronic/media/illustrations/sketchy-1/13.png"></div>
                </div>
            </div>
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST"
                            action="{{ route('login') }}">
                            @csrf
                            <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Iniciar Session</h1>
                                <div class="fv-row mb-10">
                                    <div class="d-flex flex-stack mb-2">
                                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Email</label>
                                    </div>
                                    <input
                                        class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                        type="text" name="email" autocomplete="off" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="fv-row mb-10">
                                    <div class="d-flex flex-stack mb-2">
                                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                    </div>
                                    <input
                                        class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                        type="password" name="password" autocomplete="off" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="kt_sign_in_submit"
                                        class="btn btn-lg btn-primary w-100 mb-5">
                                        <span class="indicator-label">CONTINUAR</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    {{-- <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                                    <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                        <img alt="Logo"
                                            src="{{ asset('metronic/media/svg/brand-logos/google-icon.svg') }}"
                                            class="h-20px me-3" />Continue with Google</a>
                                    <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                        <img alt="Logo"
                                            src="{{ asset('metronic/media/svg/brand-logos/facebook-4.svg') }}"
                                            class="h-20px me-3" />Continue with Facebook</a>
                                    <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
                                        <img alt="Logo"
                                            src="{{ asset('metronic/media/svg/brand-logos/apple-black.svg') }}"
                                            class="h-20px me-3" />Continue with Apple</a> --}}
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = "metronic/";
    </script>
    <script src="{{ asset('metronic/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('metronic/js/scripts.bundle.js') }}"></script>
    {{-- <script src="{{ asset('metronic/js/custom/authentication/sign-in/general.js') }}"></script> --}}
</body>

</html>
