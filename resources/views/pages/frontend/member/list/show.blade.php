<div class="modal-dialog modal-dialog-centered mw-650px">
    <!--begin::Modal content-->
    <div class="modal-content">
        <!--begin::Modal header-->
        <div class="modal-header">
            <!--begin::Modal title-->
            <h2 class="fw-bold">{{ $member->fullname }}</h2>
            <!--end::Modal title-->
            <!--begin::Close-->
            <div type="button" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-toggle="tooltip" title="Close"
                data-bs-dismiss="modal">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                            transform="rotate(-45 6 17.3137)" fill="currentColor" />
                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                            transform="rotate(45 7.41422 6)" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Close-->
        </div>
        <!--end::Modal header-->
        <!--begin::Modal body-->
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <div class="d-flex flex-column scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-height="auto"
                data-kt-scroll-offset="300px">
                <table class="table table-borderless table-row-dashed fs-6 gy-5">
                    <tbody>
                        <tr>
                            <td colspan="2" class="text-center">
                                <a href="{{ asset('images/photo/' . $item->photo) }}"
                                    data-fslightbox="lightbox-hot-sales" class="d-block overlay py-2">
                                    <div
                                        class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px mb-2">
                                        <img src="{{ asset('images/avatar/' . $item->photo) }}" class="rounded"
                                            alt="photo">
                                    </div>
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <i class="bi bi-eye-fill fs-2x text-white"></i>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-bolder">Fullname</td>
                            <td>{{ $member->fullname }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-bolder">NIM</td>
                            <td>{{ $member->nim }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-bolder">Email</td>
                            <td>{{ $member->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-bolder">Tanggal Lahir</td>
                            <td>{{ $member->date_of_birth }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-bolder">Phone</td>
                            <td>{{ $member->phone }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-bolder">Instagram</td>
                            <td><a href="https://www.instagram.com/{{ $member->instagram }}"
                                    target="_blank">{{ '@' . $member->instagram }}</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-bolder">Nama Cantik</td>
                            <td>{{ $member->family }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
</div>
<!--end::Modal dialog-->
<script src="{{ asset('guests/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('guests/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
