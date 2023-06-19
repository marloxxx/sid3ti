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
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if (localStorage.getItem("data-theme") !== null) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="form_login">
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">Login</h1>
                                <!--end::Title-->
                            </div>
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Email" name="email" autocomplete="off"
                                    class="form-control bg-transparent" />
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="Password" name="password" autocomplete="off"
                                    class="form-control bg-transparent" />
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" id="tombol_login"
                                    onclick="handle_post('#tombol_login','#form_login','{{ route('login') }}','POST');"
                                    class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Sign In</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Body-->
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url({{ asset('backend/media/misc/auth-bg.png') }})">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <!--begin::Logo-->
                    <div class="mb-0 mb-lg-12">
                        <img alt="Logo" src="backend/media/logos/custom-1.png" class="h-60px h-lg-75px" />
                    </div>
                    <!--end::Logo-->
                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
                        src="backend/media/misc/auth-screens.png" alt="" />
                    <!--end::Image-->
                    <!--begin::Title-->
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and
                        Productive</h1>
                    <!--end::Title-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('backend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
