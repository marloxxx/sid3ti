@extends('layouts.frontend.master')
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-white fw-bold my-1 fs-3">List Member</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white opacity-75">Member</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white opacity-75">List</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <div class="d-flex align-items-center py-3 py-md-1">
                <!--begin::Wrapper-->
                <div class="me-4">
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
                        <input type="text" id="keywords" class="form-control form-control-solid w-250px ps-14"
                            name="search" placeholder="Search user" onkeyup="load_data('{{ route('member.list') }}');" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Wrapper-->
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::About card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-17">
                    <!--begin::Meet-->
                    <div class="mb-18">
                        <!--begin::Wrapper-->
                        <div class="mb-11">
                            <!--begin::Top-->
                            <div class="text-center mb-18">
                                <!--begin::Title-->
                                <h3 class="fs-2hx text-dark mb-6">This is us D3 Teknologi Informasi 2021
                                </h3>
                                <!--end::Title-->
                                {{-- <!--begin::Text-->
                                <div class="fs-5 text-muted fw-semibold">
                                </div>
                                <!--end::Text--> --}}
                            </div>
                            <!--end::Top-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Meet-->
                    {{-- <!--begin::Meet-->
                    <div class="mb-18">
                        <!--begin::Wrapper-->
                        <div class="mb-11">
                            <!--begin::Top-->
                            <div class="text-center mb-18">
                                <!--begin::Title-->
                                <h3 class="fs-2hx text-dark mb-6">Meet Our Dosen Wali</h3>
                                <!--end::Title-->
                                <!--begin::Wrapper-->
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gy-10 d-flex justify-content-center">
                                    <!--begin::Item-->
                                    <div class="col-6 text-center mb-9">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-2 d-flex w-150px h-150px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('assets/media/avatars/300-20.jpg')"></div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="../../demo2/dist/pages/user-profile/projects.html"
                                                class="text-dark fw-bold text-hover-primary fs-3">Miss Mona</a>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold">Dosen Wali TI 1</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="col-6 text-center mb-9">
                                        <!--begin::Photo-->
                                        <div class="octagon mx-auto mb-2 d-flex w-150px h-150px bgi-no-repeat bgi-size-contain bgi-position-center"
                                            style="background-image:url('assets/media/avatars/300-20.jpg')"></div>
                                        <!--end::Photo-->
                                        <!--begin::Person-->
                                        <div class="mb-0">
                                            <!--begin::Name-->
                                            <a href="../../demo2/dist/pages/user-profile/projects.html"
                                                class="text-dark fw-bold text-hover-primary fs-3">Pak Tegar</a>
                                            <!--end::Name-->
                                            <!--begin::Position-->
                                            <div class="text-muted fs-6 fw-semibold">Project Manager</div>
                                            <!--begin::Position-->
                                        </div>
                                        <!--end::Person-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Top-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Meet--> --}}
                    <!--begin::Team-->
                    <div class="mb-18">
                        <!--begin::Wrapper-->
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gy-10" id="list_result">

                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Team-->
                    {{-- <!--begin::Join-->
                    <div class="text-center mb-20">
                        <!--begin::Text-->
                        <p class="fs-5 fw-semibold text-gray-600 text-start mb-15">First, a disclaimer – the entire process
                            of writing a blog post often takes more than a couple of hours, even if you can type eighty
                            words per minute and your writing skills are sharp. From the seed of the idea to finally hitting
                            “Publish,” you might spend several days or maybe even a week “writing” a blog post, but it’s
                            important to spend those vital hours planning
                        </p>
                        <!--end::Text-->
                    </div>
                    <!--end::Join--> --}}
                </div>
                <!--end::Body-->
            </div>
            <!--end::About card-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('scripts')
    <script>
        load_data('{{ route('member.list') }}');
    </script>
@endsection
