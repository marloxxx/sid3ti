@extends('layouts.backend.master')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-semibold fs-8 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('backend.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">Sliders</li>
        <li class="breadcrumb-item text-muted">Edit Slider</li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Form-->
        <form id="form_input" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="{{ route('backend.slider.index') }}"
            action="{{ route('backend.slider.update', $slider->id) }}" method="PUT">
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Edit Slider</h3>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 text-center">
                            <!--begin::Label-->
                            <label class="d-block fw-semibold fs-6 mb-5">Photo</label>
                            <!--end::Label-->
                            <!--begin::Image input-->
                            <!--begin::Image input placeholder-->
                            <style>
                                .image-input-placeholder {
                                    background-image: url({{ asset('backend/media/svg/files/blank-image.svg') }});
                                }

                                [data-theme="dark"] .image-input-placeholder {
                                    background-image: url({{ asset('backend/media/svg/files/blank-image-dark.svg') }});
                                }
                            </style>
                            <!--end::Image input placeholder-->
                            <div class="image-input image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url({{ asset('images/slider/' . $slider->image) }})"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change image">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <!--begin::Inputs-->
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="image_remove" />
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel image">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove image">
                                    <i class="bi bi-x fs-2"></i>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group-->
                    </div>
                </div>
                <!--begin::Actions-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="javascript:;" data-kt-element="cancel" class="btn btn-light me-5">Cancel</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary" data-kt-element="submit">
                        <span class="indicator-label">Save Changes</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Actions-->
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Container-->
@endsection
@push('custom-scripts')
    <script src="{{ asset('js/FormControls.js') }}"></script>
    <script>
        const formEl = $('#form_input');
        formEl.on('submit', function(e) {
            e.preventDefault();
            KTFormControls.onSubmitForm(formEl);
        });
        const btnCancelEl = formEl.find('[data-kt-element="cancel"]');
        btnCancelEl.on('click', function(e) {
            e.preventDefault();
            KTFormControls.onCancelForm(formEl);
        });
    </script>
@endpush
