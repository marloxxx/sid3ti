@extends('layouts.backend.master')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-semibold fs-8 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('backend.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">Sliders</li>
        <li class="breadcrumb-item text-muted">List Slider</li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-flush py-5">
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-filter="search" class="form-control form-control-solid w-250px ps-14"
                                placeholder="Search user" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Add slider-->
                            <a href="{{ route('backend.slider.create') }}" class="btn btn-primary">
                                <i class="ki-outline ki-plus fs-2"></i>
                                Add Slider
                            </a>
                            <!--end::Add slider-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Card-->
            <div class="row g-6 mb-6 g-xl-9 mb-xl-9 mt-5" id="list_result">

            </div>
            <!--end::Row-->

        </div>
        <!--end::Container-->
    </div>
@endsection
@push('custom-scripts')
    <script>
        load_data('{{ route('backend.slider.index') }}');
    </script>
@endpush
