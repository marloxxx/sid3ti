<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image as ImageModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Intervention\Image\Facades\Image;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function __construct()
    {
        SEOMeta::setTitleDefault(getSettings('site_name'));
        parent::__construct();
    }

    private function setMeta(string $title)
    {
        SEOMeta::setTitle($title);
        OpenGraph::setTitle(SEOMeta::getTitle());
        JsonLd::setTitle(SEOMeta::getTitle());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->setMeta('Gallery');
        $galleries = Gallery::where('title', 'like', '%' . $request->search . '%')->with('images')->paginate(9);
        return view('pages.backend.gallery.index', compact('galleries'));
    }

    public function gallery(Request $request)
    {
        $this->setMeta('Gallery');
        $galleries = Gallery::paginate(9);
        return view('pages.frontend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setMeta('Create Gallery');
        return view('pages.backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->setMeta('Create Gallery');
        $validator = Validator::Make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $gallery = Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery created',
            'id' => $gallery->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $this->setMeta('Edit Gallery');
        return view('pages.backend.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validator = Validator::Make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery updated',
            'id' => $gallery->id,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        foreach ($gallery->images as $image) {
            $oldImage = public_path($image->image_path);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $image->delete();
        }
        $gallery->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery deleted',
        ]);
    }

    public function getImages(Gallery $gallery)
    {
        // get all images except primary image
        $images = $gallery->images()->get();
        return response()->json($images);
    }

    public function storeImage(Request $request)
    {
        $gallery = Gallery::find($request->gallery_id);
        foreach ($request->file('file') as $image) {
            $img = Image::make($image->getRealPath());
            $name = time() . '.' . $image->getClientOriginalExtension();
            $img->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('images/gallery') . '/' . $name);

            $size = $image->getSize();
            $imageName = (time() + rand(1, 100)) . '.' . $image->extension();
            $image->move(public_path('images/gallery'), $imageName);
            $gallery->images()->create([
                'name' => $imageName,
                'size' => $size,
                'image_path' => "images/gallery/" . $imageName,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
        ]);
    }

    public function deleteImage(Request $request, Gallery $gallery)
    {
        $image = ImageModel::where('name', $request->name)->first();
        if ($image == null) {
            return;
        }
        $oldImage = public_path($image->image_path);
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }
        $image->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Gambar berhasil dihapus',
        ]);
    }
}
