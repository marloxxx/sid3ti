@extends('layouts.backend.master')
@section('breadcrumb')
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb fw-semibold fs-8 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('backend.dashboard') }}" class="text-muted">Home</a>
        </li>
        <li class="breadcrumb-item text-muted">Galleries</li>
        <li class="breadcrumb-item text-muted">Add Gallery</li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('content')
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Form-->
        <form id="form_input" class="form d-flex flex-column flex-lg-row"
            data-kt-redirect="{{ route('backend.gallery.index') }}" action="{{ route('backend.gallery.store') }}"
            method="POST">
            <input type="hidden" name="gallery_id" />
            <!--begin::Main column-->
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Add Gallery</h3>
                        </div>
                    </div>
                    <div class="card-body p-5">
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
                            <label class="form-label">Description</label>
                            <!--end::Label-->
                            <!--begin::Editor-->
                            <div id="description" class="min-h-200px mb-2">
                            </div>
                            <input type="hidden" name="description" />
                            <!--end::Editor-->
                            <!--begin::Description-->
                            <div class="text-muted fs-7">Set a description to the product for better visibility.
                            </div>
                            <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Date</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-lg form-control-solid" name="date"
                                id="date" placeholder="Date" />
                            <!--end::Input-->
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Media-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Media</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="fv-row mb-2">
                                    <!--begin::Dropzone-->
                                    <div class="dropzone" id="dropzone">
                                        <!--begin::Message-->
                                        <div class="dz-message needsclick">
                                            <!--begin::Icon-->
                                            <i class="ki-outline ki-file-up text-primary fs-3x"></i>
                                            <!--end::Icon-->
                                            <!--begin::Info-->
                                            <div class="ms-4">
                                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to
                                                    upload.</h3>
                                                <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                    </div>
                                    <!--end::Dropzone-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Set the homestay media gallery.</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Media-->
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
        $('input[name="start_date"]').flatpickr({
            dateFormat: "Y-m-d",
            minDate: "today",
            onChange: function(selectedDates, dateStr, instance) {
                $('input[name="end_date"]').flatpickr({
                    dateFormat: "Y-m-d",
                    minDate: dateStr,
                    defaultDate: dateStr,
                });
            }
        });
        $('input[name="end_date"]').flatpickr({
            dateFormat: "Y-m-d",
            minDate: "today",
            time_24hr: true,
        });
        const formEl = $('#form_input');
        const token = $('meta[name="csrf-token"]').attr('content');
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#dropzone", {
            url: "{{ route('backend.gallery.storeImage') }}",
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 30,
            maxFilesize: 2, // MB
            autoProcessQueue: false,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': token
            },
            init: function() {
                var myDropzone = this;
                //form submit
                formEl.on('submit', function(event) {
                    const btn = formEl.find('[data-kt-element="submit"]');
                    const action = formEl.attr("action");
                    const method = formEl.attr("method");
                    const enctype = formEl.attr("enctype");
                    const data = new FormData(formEl[0]);
                    event.preventDefault();
                    $.ajax({
                        url: action,
                        method: "POST",
                        data: data,
                        dataType: "json",
                        enctype: enctype,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            btn.attr("data-kt-indicator", "on");
                            btn.prop("disabled", true);
                        },
                        success: function(response) {
                            if (response.status == "error") {
                                Swal.fire({
                                    text: response.message,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok!",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                });
                                btn.removeAttr("data-kt-indicator");
                                btn.prop("disabled", false);
                            } else {
                                $('[name="gallery_id"]').val(response.id);
                                myDropzone.processQueue();
                            }

                        }
                    });
                });
                this.on('sending', function(file, xhr, formData) {

                });
                this.on("success", function(file, response) {

                });
                this.on("queuecomplete", function() {

                });

                // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                // of the sending event because uploadMultiple is set to true.
                this.on("sendingmultiple", function(files, xhr, formData) {
                    formData.append('gallery_id', $('[name="gallery_id"]').val());
                });

                this.on("successmultiple", function(files, response) {
                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        },
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('backend.gallery.index') }}";
                        }
                    });
                });

                this.on("errormultiple", function(files, response) {
                    // Gets triggered when there was an error sending the files.
                    // Maybe show form again, and notify user of error
                });
            },
            removedfile: function(file) {
                var fileRef;
                return (fileRef = file.previewElement) != null ? fileRef.parentNode.removeChild(
                    file.previewElement) : void 0;
            }
        });
        // Class definition
        const GalleryForm = function() {
            // Base elements
            const editorEl = $('#description');
            const toolbar = [
                [{
                    'font': []
                }, {
                    'size': []
                }],
                ['bold', 'italic', 'underline', 'strike'],
                [{
                    'color': []
                }, {
                    'background': []
                }],
                [{
                    'script': 'super'
                }, {
                    'script': 'sub'
                }],
                [{
                    'header': [false, 1, 2, 3, 4, 5, 6]
                }, 'blockquote', 'code-block'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }, {
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                ['direction', {
                    'align': []
                }],
                ['link', 'image', 'video', 'formula'],
                ['clean']
            ];
            var editor;
            // Private functions
            const _initEditor = function() {
                editor = new Quill(editorEl.get(0), {
                    placeholder: 'Enter the description...',
                    theme: 'snow',
                    modules: {
                        'toolbar': toolbar
                    }
                });
            }
            const _autoSave = function() {
                editor.on('text-change', function(delta, oldDelta, source) {
                    if (source == 'user') {
                        $('input[name="description"]').val(editor.root.innerHTML);
                    }
                });
            }
            const _datePicker = function() {
                $('#date').flatpickr();
            }

            return {
                // public functions
                init: function() {
                    _initEditor();
                    _autoSave();
                    _datePicker();
                }
            };
        }();

        jQuery(document).ready(function() {
            GalleryForm.init();
        });
    </script>
@endpush
