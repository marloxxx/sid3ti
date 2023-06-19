@extends('layouts.frontend.master')
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-15" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-white fw-bold my-1 fs-3">Schedule</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-white opacity-75">
                        <a href="" class="text-white text-hover-primary">Schedule</a>
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
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <h2 class="card-title fw-bold">Schedule</h2>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('scripts')
    <script>
        // get json data
        var calendarEl = document.getElementById("calendar");
        var events = {!! json_encode($schedules) !!};
        // get events from database
        var calendar = new FullCalendar.Calendar(calendarEl, {
            // set title
            titleFormat: {
                year: 'numeric',
                month: 'long',
            },
            headerToolbar: {
                center: "title",
                right: "timeGridWeek,timeGridDay",
            },
            initialDate: new Date(),
            initialView: "timeGridWeek",
            // disable all day
            allDaySlot: false,
            slotMinTime: "08:00:00",
            slotMaxTime: "23:00:00",
            events: events,
            locale: "id",
        });

        calendar.render();
    </script>
@endsection
