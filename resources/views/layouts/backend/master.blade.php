<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    {!! SEO::generate(true) !!}
    <link rel="shortcut icon" href="{{ asset('images/' . getSettings('site_favicon')) }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    @include('layouts.backend.head')
</head>

<body id="kt_body"
    class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <div class="page-loader flex-column">
        <img alt="Logo" style="width:5%;" class="max-h-25px"
            src="{{ asset('images/' . getSettings('site_logo')) }}" />
        <div class="d-flex align-items-center mt-5">
            <span class="spinner-border text-primary" role="status"></span>
            <span class="text-muted fs-6 fw-bold ms-5">Please Wait...</span>
        </div>
    </div>
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('layouts.backend.aside')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('layouts.backend.header')
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')
                </div>
                <!--end::Content-->
                @include('layouts.backend.footer')
            </div>
        </div>
    </div>
    @include('layouts.backend.script')
    @stack('custom-scripts')
</body>
