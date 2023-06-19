@extends('layouts.backend.master')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-semibold fs-8 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('backend.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">Schedules</li>
        <li class="breadcrumb-item text-muted">List Schedule</li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <div id="content_list">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">

                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Add Schedule-->
                            <a href="{{ route('backend.schedule.create') }}" class="btn btn-primary">
                                <i class="ki-outline ki-plus fs-2"></i>
                                Add Schedule
                            </a>
                            <!--end::Add Schedule-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4 table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatables">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Day</th>
                                <th class="min-w-125px">Title</th>
                                <th class="min-w-125px">Start</th>
                                <th class="min-w-125px">End</th>
                                <th class="text-end min-w-100px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-semibold">
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#kt_toolbar_delete_button').hide();
            $('#datatables').DataTable({
                serverSide: true,
                ajax: '{{ route('backend.schedule.index') }}',
                columns: [{
                        data: 'day',
                        name: 'day'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'start',
                        name: 'start'
                    },
                    {
                        data: 'end',
                        name: 'end'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                order: [
                    [0, 'asc']
                ],
                responsive: true
            });

            $('[data-filter="search"]').on('keyup', function() {
                $('#datatables').DataTable().search(
                    $(this).val()
                ).draw();
            });
        });
    </script>
@endpush
