@extends('layouts.backend.master')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-semibold fs-8 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('backend.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">Schedules</li>
        <li class="breadcrumb-item text-muted">Add Schedule</li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Form-->
        <form id="form_input" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="{{ route('backend.schedule.index') }}" action="{{ route('backend.schedule.store') }}"
            method="POST">
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Add Schedule</h3>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Day</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="day" class="form-select form-select-solid" data-control="select2"
                                data-placeholder="Select a day">
                                <option></option>
                                <option value="Monday">Senin</option>
                                <option value="Tuesday">Selasa</option>
                                <option value="Wednesday">Rabu</option>
                                <option value="Thursday">Kamis</option>
                                <option value="Friday">Jumat</option>
                                <option value="Saturday">Sabtu</option>
                                <option value="Sunday">Minggu</option>
                            </select>
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="title"
                                placeholder="Title" />
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Start</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="start"
                                placeholder="Start" />
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">End</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="end"
                                placeholder="End" />
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Ruangan</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="room"
                                placeholder="Room" />
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
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
        $("input[name='start']").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
        $("input[name='end']").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
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
