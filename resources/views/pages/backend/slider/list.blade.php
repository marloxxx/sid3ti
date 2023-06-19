@foreach ($sliders as $item)
    <div class="col-md-6 col-xxl-4">
        <div class="overlay bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px p-5 text-white rounded-3 text-center"
            style="background-image: url('{{ asset('images/slider/' . $item->image) }}');">
            <h3 class="text-white">{{ $item->title }}</h3>
            <div class="overlay-wrapper rounded-3">
                <div class="overlay-layer">
                    <a href="{{ route('backend.slider.edit', $item->id) }}" class="btn btn-sm btn-warning me-3">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:;"
                        onclick="handle_confirm('Apakah Anda Yakin?','Yakin','Tidak','DELETE','{{ route('backend.slider.destroy', $item->id) }}');"
                        class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
@if ($sliders->hasMorePages())
    {{ $sliders->links('components.pagination') }}
@endif
