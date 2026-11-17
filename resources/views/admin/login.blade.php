<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('admin/assets') }}/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Executive Login — ICRW Portal</title>
    <meta name="description" content="Institute of Creative and Research Writing (ICRW) Executive Portal" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('index/welcome/logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>

    <style>
        :root {
            --bs-primary: #092145 !important;
            --bs-primary-rgb: 9, 33, 69 !important;
            --bs-link-color: #092145 !important;
            --bs-link-hover-color: #0d2f60 !important;
        }
        .btn-primary {
            background-color: #092145 !important;
            border-color: #092145 !important;
            box-shadow: 0 4px 14px rgba(9, 33, 69, 0.35) !important;
        }
        .btn-primary:hover {
            background-color: #0d2f60 !important;
            border-color: #0d2f60 !important;
            box-shadow: 0 6px 18px rgba(9, 33, 69, 0.45) !important;
        }
        .btn-primary:focus,
        .btn-primary:active {
            background-color: #06162e !important;
            border-color: #06162e !important;
            box-shadow: 0 0 0 0.25rem rgba(9, 33, 69, 0.25) !important;
        }
        .form-control:focus {
            border-color: #092145 !important;
            box-shadow: 0 0 0 0.2rem rgba(9, 33, 69, 0.15) !important;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 50% 20%, #f4f6f8 0%, #e2e8f0 100%);
        }
    </style>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner" style="max-width: 420px;">
                <!-- Login Card -->
                <div class="card shadow-lg border-0" style="border-radius: 16px;">
                    <div class="card-body p-4 p-sm-5">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-3">
                            <a href="{{ route('home') }}" class="app-brand-link gap-2 d-flex flex-column align-items-center">
                                <img src="{{ asset('index/welcome/logo.png') }}" width="64px" height="64px" style="object-fit: contain;" alt="ICRW Seal" />
                                <span class="app-brand-text demo text-body fw-bolder fs-4 text-center mt-2" style="text-transform: none; color: #111827 !important; letter-spacing: -0.5px;">
                                    ICRW Portal
                                </span>
                            </a>
                        </div>
                        
                        <div class="text-center mb-4">
                            <h5 class="mb-1 fw-bold text-dark">Executive Sign In</h5>
                            <p class="text-muted small mb-0">Institute of Creative & Research Writing</p>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('warning'))
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                {{ session('warning') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-3" action="{{ route('login.submit') }}" method="POST">
                            @csrf

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Administrative Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}"
                                    placeholder="admin@icrw.net" required autofocus />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label fw-semibold" for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="••••••••••••" aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Remember Me --}}
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                                    <label class="form-check-label small" for="remember-me"> Keep me signed in </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100 py-2 fw-bold" type="submit">
                                    Sign In to Console
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="{{ route('home') }}" class="small text-muted d-inline-flex align-items-center gap-1">
                                <i class="bx bx-left-arrow-alt"></i> Return to Public Site
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
</body>

</html>
