<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Slider::paginate(9);
            return view('pages.backend.slider.list', compact('sliders'));
        }
        return view('pages.backend.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.+
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::Make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $file = $request->file('image');
        $name = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('images/slider');
        $img = Image::make($file->getRealPath());
        $img->resize(1920, 1080, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $name);

        Slider::create([
            'image' => $name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Slider created',
            'redirect' => route('backend.slider.index'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('pages.backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $validator = Validator::Make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        if ($slider->image != null) {
            $path = public_path('images/slider/' . $slider->image);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $file = $request->file('image');
        $name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/slider'), $name);

        $slider->update([
            'image' => $name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Slider updated',
            'redirect' => route('backend.slider.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image != null) {
            $path = public_path('images/slider/' . $slider->image);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $slider->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Slider deleted',
        ]);
    }
}
