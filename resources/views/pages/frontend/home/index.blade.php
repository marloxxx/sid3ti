@extends('layouts.frontend.master')
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-white fw-bold my-1 fs-3">Home</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="{{ route('home') }}" class="text-white text-hover-primary">Home</a>
                    </li>
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
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::About card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body p-lg-17">
                    <!--begin::About-->
                    <div class="mb-18">
                        <!--begin::Wrapper-->
                        <div class="mb-10">
                            <!--begin::Top-->
                            <div class="text-center mb-15">
                                <!--begin::Title-->
                                <h3 class="fs-2hx text-dark mb-5">D3 Teknologi Informasi 2021</h3>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <div class="fs-5 text-muted fw-semibold">Kami keluarga besar D3 Teknologi Informasi angkatan
                                    2021
                                    <br />Institut Teknologi DEL
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Top-->
                            <div class="tns">
                                <div data-tns="true" data-tns-nav-position="bottom" data-tns-controls="false"
                                    data-tns-speed="1000" data-tns-autoplay="true">
                                    @foreach ($sliders as $item)
                                        <!--begin::Item-->
                                        <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                            <img class="w-75 card-rounded"
                                                src="{{ asset('images/slider/' . $item->image) }}" alt="" />
                                        </div>
                                        <!--end::Item-->
                                    @endforeach
                                </div>
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Description-->
                        <div class="fs-5 fw-semibold text-gray-600">
                            <h3 class="title">VISI</h3>
                            <!--begin::Text-->
                            <p class="mb-8">Menjadi program studi unggulan pada program pendidikan dan penelitian terapan
                                di bidang pengembangan teknologi informasi yang bertaraf nasional dan internasional pada
                                tahun 2024.
                            </p>
                            <!--end::Text-->
                            <!--begin::Text-->
                            <h3 class="title">MISI</h3>
                            <ul class="mb-8">
                                <li class="subtitle">Menyelenggarakan pendidikan vokasi yang unggul untuk menghasilkan
                                    sumber daya manusia yang profesional di bidang teknologi informasi dan komunikasi;</li>
                                <li class="subtitle">Meningkatkan program penelitian terapan yang inovatif dan bertaraf
                                    nasional maupun internasional di bidang teknologi informasi dan komunikasi;</li>
                                <li class="subtitle">Meningkatkan program pengabdian masyarakat melalui kerjasama dengan
                                    berbagai institusi pemerintahan dan industri di tingkat regional maupun nasional.</li>
                            </ul>
                            <!--end::Text-->
                            <h3 class="title">TUJUAN PENDIDIKAN</h3>
                            <!--begin::Text-->
                            <ul>
                                <li>Meningkatkan peringkat akreditasi program studi menjadi unggul.</li>
                                <li>Mewujudkan tata kelola program studi yang berkualitas.</li>
                                <li>Menghasilkan alumni yang memiliki pengetahuan dan keterampilan dalam bidang informatika
                                    yang gayut terhadap kebutuhan industri, berjiwa kepemimpinan, serta berkarakter
                                    mar-Tuhan, marroha, dan marbisuk.</li>
                                <li>Meningkatkan kualitas sumber daya manusia serta sarana dan prasarana akademik.</li>
                                <li>Menyediakan organisasi serta sarana dan prasarana penelitian yang berkualitas demi
                                    terwujudnya rencana dan peta jalan penelitian yang bertaraf nasional dalam bidang
                                    informatika.</li>
                            </ul>
                            <!--end::Text-->
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::About-->
                    <!--begin::Statistics-->
                    <div class="card bg-light mb-18">
                        <!--begin::Body-->
                        <div class="card-body py-15">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-center">
                                <!--begin::Items-->
                                <div class="row d-flex justify-content-between mb-10 mx-auto w-xl-900px">
                                    <!--begin::Item-->
                                    <div class="col-sm-6 octagon d-flex flex-center h-200px w-200px bg-body mx-2">
                                        <!--begin::Content-->
                                        <div class="text-center">
                                            <!--begin::Symbol-->
                                            <!--begin::Icon total users-->
                                            <span class="fas fa-users fs-3x text-gray-600"></span>
                                            <!--end::Svg Icon-->
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="mt-1">
                                                <!--begin::Animation-->
                                                <div class="fs-lg-2hx fs-2x fw-bold text-gray-800">
                                                    <div class="min-w-70px" data-kt-countup="true"
                                                        data-kt-countup-value="71">0</div>
                                                </div>
                                                <!--end::Animation-->
                                                <!--begin::Label-->
                                                <span class="text-gray-600 fw-semibold fs-5 lh-0">Total Mahasiswa</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="col-sm-6 octagon d-flex flex-center h-200px w-200px bg-body mx-2">
                                        <!--begin::Content-->
                                        <div class="text-center">
                                            <!--begin::Symbol-->
                                            <!--begin::Icon total user-male-->
                                            <span class="fas fa-person fs-3x text-gray-600"></span>
                                            <!--end::Icon-->
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="mt-1">
                                                <!--begin::Animation-->
                                                <div class="fs-lg-2hx fs-2x fw-bold text-gray-800 text-center">
                                                    <div class="text-center" data-kt-countup="true"
                                                        data-kt-countup-value="30">0
                                                    </div>
                                                </div>
                                                <!--end::Animation-->
                                                <!--begin::Label-->
                                                <span class="text-gray-600 fw-semibold fs-5 lh-0">ASPA</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="col-sm-6 octagon d-flex flex-center h-200px w-200px bg-body mx-2">
                                        <!--begin::Content-->
                                        <div class="text-center">
                                            <!--begin::Symbol-->
                                            <!--begin::Icon female users-->
                                            <span class="fas fa-person-dress fs-3x text-gray-600"></span>
                                            <!--end::Symbol-->
                                            <!--begin::Text-->
                                            <div class="mt-1">
                                                <!--begin::Animation-->
                                                <div class="fs-lg-2hx fs-2x fw-bold text-gray-800">
                                                    <div class="min-w-50px" data-kt-countup="true"
                                                        data-kt-countup-value="41">0</div>
                                                </div>
                                                <!--end::Animation-->
                                                <!--begin::Label-->
                                                <span class="text-gray-600 fw-semibold fs-5 lh-0">ASPI</span>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Testimonial-->
                            <div class="fs-2 fw-semibold text-muted text-center mb-3">
                                <span class="fs-1 lh-1 text-gray-700">“</span>Keras, Gila, Berbahaya<span
                                    class="fs-1 lh-1 text-gray-700">“</span>
                            </div>
                            <!--end::Testimonial-->
                            <!--begin::Author-->
                            <div class="fs-2 fw-semibold text-muted text-center">
                                <span class="link-primary fs-4 fw-bold">D3 Teknologi Informasi</span>
                                <span class="fs-4 fw-bold text-gray-600">Member Class</span>
                            </div>
                            <!--end::Author-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::About card-->
        </div>
    </div>
    <!--end::Content-->
@endsection
@section('scripts')
    <script src="guests/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
    <script src="guests/js/widgets.bundle.js"></script>
    <script src="guests/js/custom/widgets.js"></script>
    <script src="guests/js/custom/apps/chat/chat.js"></script>
    <script src="guests/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="guests/js/custom/utilities/modals/create-app.js"></script>
    <script src="guests/js/custom/utilities/modals/users-search.js"></script>
@endsection
