@extends('layouts.frontend.master')
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-white fw-bold my-1 fs-3">Gallery</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white opacity-75">Gallery</li>
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
            <!--begin::Home card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-20">
                    <!--begin::Section-->
                    <div class="mb-17">
                        <!--begin::Content-->
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Title-->
                            <h3 class="text-dark">Latest Activities</h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-9"></div>
                        <!--end::Separator-->
                        <!--begin::Row-->
                        <div class="row g-10">
                            @foreach ($galleries as $item)
                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <!--begin::Hot sales post-->
                                    <div class="card-xl-stretch me-md-6">
                                        <div class="tns tns-default">
                                            <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false"
                                                data-tns-speed="2000" data-tns-autoplay="true"
                                                data-tns-autoplay-timeout="18000" data-tns-controls="true"
                                                data-tns-nav="false" data-tns-items="1" data-tns-center="false"
                                                data-tns-dots="false"
                                                data-tns-prev-button="#kt_team_slider_prev{{ $item->id }}"
                                                data-tns-next-button="#kt_team_slider_next{{ $item->id }}">

                                                @foreach ($item->images as $image)
                                                    <!--begin::Overlay-->
                                                    <a class="d-block overlay px-2 py-2"
                                                        data-fslightbox="lightbox-hot-sales"
                                                        href="{{ asset($image->image_path) }}">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                            style="background-image:url('{{ asset($image->image_path) }}')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Overlay-->
                                                @endforeach
                                            </div>
                                            <button class="btn btn-icon btn-active-color-primary"
                                                id="kt_team_slider_prev{{ $item->id }}" aria-controls="tns1"
                                                tabindex="-1" data-controls="prev">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
                                                <span class="svg-icon svg-icon-3x">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                            <button class="btn btn-icon btn-active-color-primary"
                                                id="kt_team_slider_next{{ $item->id }}" aria-controls="tns1"
                                                tabindex="-1" data-controls="next">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                <span class="svg-icon svg-icon-3x">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12.7343 12.5657L8.55 16.75C8.13579 17.1642 8.13579 17.8358 8.55 18.25C8.96421 18.6642 9.63579 18.6642 10.05 18.25L15.5929 12.7071C15.9834 12.3166 15.9834 11.6834 15.5929 11.2929L10.05 5.75C9.63579 5.33579 8.96421 5.33579 8.55 5.75C8.13579 6.16421 8.13579 6.83579 8.55 7.25L12.7343 11.4343C13.0467 11.7467 13.0467 12.2533 12.7343 12.5657Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </div>
                                        <!--begin::Body-->
                                        <div class="mt-5">
                                            <!--begin::Title-->
                                            <div class="fs-4 text-dark fw-bold text-hover-primary text-dark lh-base">
                                                {{ $item->title }}</div>
                                            <!--end::Title-->
                                            <!--begin::Text-->
                                            <div class="fw-semibold fs-5 text-gray-600 text-dark mt-3">
                                                {!! $item->description !!}
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Hot sales post-->
                                </div>
                                <!--end::Col-->
                            @endforeach
                        </div>
                        <!--end::Row-->
                        @if ($galleries->hasMorePages())
                            {{ $galleries->links('components.pagination') }}
                        @endif
                    </div>
                    <!--end::Section-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Home card-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
