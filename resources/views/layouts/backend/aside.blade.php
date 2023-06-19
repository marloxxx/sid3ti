<!--begin::Aside-->
<div id="kt_aside" class="aside bg-primary" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
    <!--begin::Logo-->
    <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-8" id="kt_aside_logo">
        <a href="{{ route('backend.dashboard') }}">
            <img alt="Logo" src="{{ asset('backend/media/logos/demo4.svg') }}" class="h-55px" />
        </a>
    </div>
    <!--end::Logo-->
    <!--begin::Nav-->
    <div class="aside-nav d-flex flex-column align-lg-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
        <!--begin::Primary menu-->
        <div class="hover-scroll-overlay-y my-2 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
            data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div id="kt_aside_menu"
                class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold fs-6"
                data-kt-menu="true">
                <!--begin:Menu item-->
                <div class="menu-item py-2">
                    <!--begin:Menu link-->
                    <a href="{{ route('backend.dashboard') }}"
                        class="menu-link {{ request()->is('backend/dashboard') ? 'active' : '' }} menu-center"
                        title="Dashboard" data-bs-toggle="tooltip">
                        <span class="menu-icon me-0">
                            <i class="fas fa-home fs-1"></i>
                        </span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item py-2">
                    <!--begin:Menu link-->
                    <a href="{{ route('backend.member.index') }}"
                        class="menu-link {{ request()->is('backend/member*') ? 'active' : '' }} menu-center"
                        title="Member" data-bs-toggle="tooltip">
                        <span class="menu-icon me-0">
                            <i class="fas fa-users fs-1"></i>
                        </span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item py-2">
                    <!--begin:Menu link-->
                    <a href="{{ route('backend.gallery.index') }}"
                        class="menu-link {{ request()->is('backend/gallery*') ? 'active' : '' }} menu-center"
                        title="Gallery" data-bs-toggle="tooltip">
                        <span class="menu-icon me-0">
                            <i class="fas fa-images fs-2x"></i>
                        </span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item py-2">
                    <!--begin:Menu link-->
                    <a href="{{ route('backend.schedule.index') }}"
                        class="menu-link {{ request()->is('backend/schedule') ? 'active' : '' }} menu-center"
                        title="Schedule" data-bs-toggle="tooltip">
                        <span class="menu-icon me-0">
                            <i class="fas fa-calendar-alt fs-1"></i>
                        </span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item py-2">
                    <!--begin:Menu link-->
                    <a href="{{ route('backend.slider.index') }}"
                        class="menu-link {{ request()->is('backend/slider') ? 'active' : '' }} menu-center"
                        title="Slider" data-bs-toggle="tooltip">
                        <span class="menu-icon me-0">
                            <i class="fas fa-sliders-h fs-1"></i>
                        </span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item py-2">
                    <!--begin:Menu link-->
                    <a href="{{ route('backend.settings.index') }}"
                        class="menu-link {{ request()->is('backend/settings') ? 'active' : '' }} menu-center"
                        title="Slider" data-bs-toggle="tooltip">
                        <span class="menu-icon me-0">
                            <i class="fas fa-cogs fs-1"></i>
                        </span>
                    </a>
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Primary menu-->
    </div>
    <!--end::Nav-->
    <!--begin::Footer-->
    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
        <!--begin::Menu-->
        <div class="mb-7">
        </div>
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->
