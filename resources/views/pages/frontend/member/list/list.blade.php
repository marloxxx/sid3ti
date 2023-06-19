@foreach ($members as $item)
    <!--begin::Item-->
    <div class="col-xxl-4 col-xl-6 col-md-6 col-sm-6 col-xs-6 text-center">
        <!--begin::Photo-->
        <a href="{{ asset('images/photo/' . $item->photo) }}" data-fslightbox="lightbox-hot-sales"
            class="d-block overlay py-2">
            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px mb-2">
                <img src="{{ asset('images/avatar/' . $item->photo) }}" class="rounded" alt="photo">
            </div>
            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                <i class="bi bi-eye-fill fs-2x text-white"></i>
            </div>
        </a>
        <!--end::Photo-->
        <!--begin::Person-->
        <div class="mb-0">
            <!--begin::Name-->
            <a href="javascript:;" class="text-dark fw-bold text-hover-primary fs-3 text-capitalize"
                onclick="handle_open_modal('{{ route('member.show', $item->id) }}', '#customModal', 'GET')">{{ $item->fullname }}</a>
            <!--end::Name-->
            <!--begin::Position-->
            <div class="text-muted fs-6 fw-semibold">{{ $item->nim }}</div>
            <div class="text-muted fs-6 fw-semibold text-upercase">{{ $item->family }}</div>
            <!--begin::Position-->
            <div class="card mb-4 bg-light text-center">
                <!--begin::Body-->
                <div class="card-body py-5">
                    <!--begin::Icon-->
                    <a href="https://www.instagram.com/{{ $item->instagram }}" target="_blank" class="mx-4">
                        <i class="bi bi-instagram fs-2x text-dark"></i>
                    </a>
                    <!--end::Icon-->
                    <!--begin::Icon-->
                    <a href="https://wa.me/{{ $item->phone }}" target="_blank" class="mx-4">
                        <i class="bi bi-whatsapp fs-2x text-dark"></i>
                    </a>
                    <!--end::Icon-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Person-->
    </div>
    <!--end::Item-->
@endforeach
<script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
