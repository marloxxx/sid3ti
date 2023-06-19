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
                    <li class="breadcrumb-item text-white opacity-75">Birthday</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
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
                                <h3 class="fs-2hx text-dark mb-6">Birthday</h3>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fs-5 text-muted fw-semibold">Nama-nama yang berulang tahun dalam minggu ini
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Top-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Meet-->
                    <!--begin::Team-->
                    @for ($i = 0; $i < 7; $i++)
                        <div class="mb-10">
                            <div class="mb-18">
                                <!--begin::Title-->
                                <h3 class="text-dark mb-6"></h3>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fs-5 text-muted fw-semibold">
                                    @if ($i == 0)
                                        Hari ini
                                    @elseif($i == 1)
                                        Besok
                                    @else
                                        {{ $i }} hari lagi
                                    @endif
                                </div>
                                <!--end::Text-->
                            </div>
                            @foreach ($members[$i]['members'] as $item)
                                <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-4 gy-10">
                                    <div class="col text-center mb-5">
                                        <div class="symbol symbol-circle symbol-100px text-center">
                                            <img src="{{ asset('files/member/' . $item->photo) }}" alt="" />
                                        </div>
                                        <div class="mb-0">
                                            <a href="javascript:;" class="text-dark fs-3">
                                                {{ $item->fullname }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endfor

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
