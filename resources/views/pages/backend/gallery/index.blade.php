@extends('layouts.backend.master')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-semibold fs-8 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('backend.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">Galleries</li>
        <li class="breadcrumb-item text-muted">List Gallery</li>
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
                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                            <form action="{{ route('backend.gallery.index') }}" method="GET">
                                @csrf
                                <input type="text" data-filter="search"
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Search Gallery" />
                            </form>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Add gallery-->
                            <a href="{{ route('backend.gallery.create') }}" class="btn btn-primary">
                                <i class="ki-outline ki-plus fs-2"></i>
                                Add Gallery
                            </a>
                            <!--end::Add gallery-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Card-->
            <div class="row g-6 mb-6 g-xl-9 mb-xl-9 mt-5" id="list_result">
                @foreach ($galleries as $item)
                    <div class="col-md-6 col-xxl-4">
                        <div class="tns">
                            <div data-tns="true" data-tns-nav-position="bottom" data-tns-controls="false">
                                @foreach ($item->images as $image)
                                    <!--begin::Item-->
                                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                        <div class="overlay bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px p-5 text-white rounded-3 text-center"
                                            style="background-image: url('{{ asset($image->image_path) }}');">
                                            <h3 class="text-white">{{ $item->title }}</h3>
                                            <div class="overlay-wrapper rounded-3">
                                                <div class="overlay-layer">
                                                    <a href="{{ route('backend.gallery.edit', $item->id) }}"
                                                        class="btn btn-sm btn-warning me-3">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="javascript:;"
                                                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('backend.gallery.destroy', $item->id) }}');"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Item-->
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
@endsection
