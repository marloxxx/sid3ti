@extends('layouts.backend.master')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-semibold fs-8 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('backend.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">Members</li>
        <li class="breadcrumb-item text-muted">Edit Member</li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <form id="form_input" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="{{ route('backend.member.index') }}"
            action="{{ route('backend.member.update', $member->id) }}" method="PUT">
            <!--begin::Aside column-->
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                <!--begin::Photo settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Photo</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body text-center pt-0">
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
                                style="background-image: url({{ asset('images/avatar/' . $member->photo) }})"></div>

                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image
                            files
                            are accepted</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Thumbnail settings-->
                <!--begin::Date of Birth settings-->
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Date of Birth</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body text-center pt-0">
                        <!--begin::Input group-->
                        <div class="input-group input-group-lg input-group-solid mb-3">
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" id="dob"
                                name="date_of_birth" placeholder="Date of Birth" value="{{ $member->date_of_birth }}" />
                            <!--end::Input-->
                            <!--begin::Icon-->
                            <span class="input-group-text">
                                <i class="bi bi-calendar"></i>
                            </span>
                            <!--end::Icon-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7">Input the date of birth of the member</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            <!--end::Aside column-->
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>General</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="fullname" class="form-control mb-2" placeholder="Enter Fullname"
                                value="{{ $member->fullname }}" />
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A fullname is required and recommended to be
                                unique.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" name="email" class="form-control mb-2" placeholder="Enter Email"
                                value="{{ $member->email }}" />
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A email is required and recommended to be
                                unique.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Whatsapp</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="phone" class="form-control mb-2" placeholder="Enter Phone"
                                value="{{ $member->phone }}" />
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A Whatsapp number is required and recommended to be
                                unique. Write 62xxxxx.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">NIM</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="nim" class="form-control mb-2" placeholder="Enter NIM"
                                value="{{ $member->nim }}" />
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A NIM is required and recommended to be
                                unique.
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Gender</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="gender" class="form-select mb-2" data-control="select2" data-hide-search="true"
                                data-placeholder="Select an option">
                                <option></option>
                                <option value="Men" {{ $member->gender == 'Men' ? 'Selected' : '' }}>Men</option>
                                <option value="Women" {{ $member->gender == 'Women' ? 'Selected' : '' }}>Women</option>
                            </select>
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A Gender is required and recommended to be
                                unique.
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Beautiful Family</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="family" class="form-control mb-2"
                                placeholder="Enter Beautiful Family" value="{{ $member->family }}" />
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A Beautiful Family is required and recommended to be
                                unique.
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                            <!--begin::Label-->
                            <label class="required form-label">Instagram</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="instagram" class="form-control mb-2"
                                placeholder="Enter Instagram" value="{{ $member->instagram }}" />
                            <!--end::Input-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">A Instagram is required and recommended to be
                                unique.
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Card header-->
                </div>
                <!--end::Tab content-->
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
            </div>
            <!--end::Main column-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Container-->
@endsection
@push('custom-scripts')
    <script src="{{ asset('js/FormControls.js') }}"></script>
    <script>
        const formEl = $('#form_input');
        $('#dob').flatpickr();
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
