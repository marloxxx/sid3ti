@extends('layouts.backend.master')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-semibold fs-8 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('backend.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">Members</li>
        <li class="breadcrumb-item text-muted">List Member</li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                        <input type="text" data-filter="search" class="form-control form-control-solid w-250px ps-13"
                            placeholder="Search user" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Add user-->
                        <a href="{{ route('backend.member.create') }}" class="btn btn-primary">
                            <i class="ki-outline ki-plus fs-2"></i>
                            Add User
                        </a>
                        <!--end::Add user-->
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
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">Member</th>
                            <th class="min-w-125px">NIM</th>
                            <th class="min-w-125px">Email</th>
                            <th class="min-w-125px">Phone</th>
                            <th class="min-w-125px">Date of Birth</th>
                            <th class="text-end min-w-100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                    </tbody>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#kt_toolbar_delete_button').hide();
            $('#datatables').DataTable({
                serverSide: true,
                ajax: '{{ route('backend.member.index') }}',
                columns: [{
                        data: 'fullname',
                        name: 'fullname'
                    },
                    {
                        data: 'nim',
                        name: 'nim'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'date_of_birth',
                        name: 'date_of_birth'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
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
