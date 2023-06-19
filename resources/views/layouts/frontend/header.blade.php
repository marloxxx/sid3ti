<div id="kt_header" class="header align-items-stretch" data-kt-sticky="true" data-kt-sticky-name="header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <!--begin::Container-->
    <div class="container-xxl d-flex align-items-center">
        <!--begin::Heaeder menu toggle-->
        <div class="d-flex topbar align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px"
                id="kt_header_menu_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Heaeder menu toggle-->
        <!--begin::Header Logo-->
        <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('home') }}">
                <img alt="Logo" src="{{ asset('images/logo.svg') }}" class="logo-default h-50px" />
                <img alt="Logo" src="{{ asset('images/logo.svg') }}" class="logo-sticky h-50px" />
            </a>
        </div>
        <!--end::Header Logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-400 fw-semibold my-5 my-lg-0 align-items-stretch px-2 px-lg-0"
                        id="#kt_header_menu" data-kt-menu="true">
                        <!--begin:Menu item-->
                        <div class="menu-item me-0 me-lg-2 {{ request()->is('/') ? 'here' : '' }}">
                            <!--begin:Menu link-->
                            <a href="{{ route('home') }}" class="menu-link py-3">
                                <span class="menu-title">Home</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="bottom-start"
                            class="menu-item me-0 me-lg-2 {{ request()->is('member*') ? 'here' : '' }}">
                            <!--begin:Menu link-->
                            <span class="menu-link py-3">
                                <span class="menu-title">Member</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <!--end:Menu link-->
                            <!--begin:Menu sub-->
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0" style="">
                                <!--begin:Pages menu-->
                                <div class="menu-active-bg px-4 px-lg-0">
                                    <!--begin:Menu item-->
                                    <div class="menu-item p-0 m-0">
                                        <!--begin:Menu link-->
                                        <a href="{{ route('member.list') }}"
                                            class="menu-link {{ request()->is('member/list') ? 'active' : '' }}">
                                            <span class="menu-title">List</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div class="menu-item p-0 m-0">
                                        <!--begin:Menu link-->
                                        <a href="{{ route('member.birthday') }}"
                                            class="menu-link {{ request()->is('member/birthday') ? 'active' : '' }}">
                                            <span class="menu-title">Birthday</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                </div>
                            </div>
                            <!--end:Menu sub-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item me-0 me-lg-2 {{ request()->is('gallery') ? 'here' : '' }}">
                            <!--begin:Menu link-->
                            <a href="{{ route('gallery') }}" class="menu-link py-3">
                                <span class="menu-title">Gallery</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item me-0 me-lg-2 {{ request()->is('schedule') ? 'here' : '' }}">
                            <!--begin:Menu link-->
                            <a href="{{ route('schedule') }}" class="menu-link py-3">
                                <span class="menu-title">Schedule</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
