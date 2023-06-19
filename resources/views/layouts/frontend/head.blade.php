<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Vendor Stylesheets(used by this page)-->
<link href="{{ asset('frontend/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('frontend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{ asset('frontend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('frontend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<script src="https://kit.fontawesome.com/07ad57e463.js" crossorigin="anonymous"></script>
<!--end::Global Stylesheets Bundle-->
@yield('styles')
