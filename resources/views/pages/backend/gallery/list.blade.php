@foreach ($galleries as $item)
    <div class="col-md-6 col-xxl-4">
        <div class="tns">
            <div data-tns="true" data-tns-nav-position="bottom" data-tns-controls="false">
                @foreach ($item->images as $image)
                    <!--begin::Item-->
                    <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                        <div class="overlay bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px p-5 text-white rounded-3 text-center"
                            style="background-image: url('{{ asset($image->image_path) }}');">
                            <h3 class="text-white">{{ $item->title }}</h3>
                            <div class="overlay-wrapper rounded-3">
                                <div class="overlay-layer">
                                    <a href="{{ route('backend.gallery.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning me-3">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:;"
                                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('backend.gallery.destroy', $item->id) }}');"
                                        class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--end::Item-->
                @endforeach
            </div>
        </div>
    </div>
@endforeach
