<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
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
    public function index()
    {
        $this->setMeta('Settings');
        $setting = Setting::first();
        return view('pages.backend.settings.index', compact('setting'));
    }

    public function update_site(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_favicon' => 'file|mimes:jpeg,png,jpg,gif,svg,ico|max:2048',
            'site_name' => 'required',
            'site_email' => 'required|email:rfc,dns',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }

        $setting = Setting::first();

        if ($request->hasFile('site_logo')) {
            $path = public_path('images/' . $setting->site_logo);
            if (file_exists($path)) {
                unlink($path);
            }
            $logo = $request->file('site_logo');
            $logo_name = $logo->getClientOriginalName();
            $logo->move(public_path('images'), $logo_name);
            $setting->site_logo = $logo_name;
        }

        if ($request->hasFile('site_favicon')) {
            $path = public_path('images/' . $setting->site_favicon);
            if (file_exists($path)) {
                unlink($path);
            }
            $favicon = $request->file('site_favicon');
            $favicon_name = $favicon->getClientOriginalName();
            $favicon->move(public_path('images'), $favicon_name);
            $setting->site_favicon = $favicon_name;
        }

        $setting->update([
            'site_name' => $request->site_name,
            'site_email' => $request->site_email,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Settings Updated Successfully',
            'redirect' => 'reload'
        ]);
    }

    public function update_user(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
                'password' => 'required|confirmed',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ]);
        }

        // update user
        $user = User::find(auth()->user()->id);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        // update password
        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data',
            'redirect' => 'reload'
        ]);
    }

    public function update_seo(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'keywords' => 'required',
                'description' => 'required',
                'google_analytics' => 'required'
            ],
            [
                'keywords.required' => 'Keywords tidak boleh kosong',
                'description.required' => 'Description tidak boleh kosong',
                'google_analytics.required' => 'Google Analytics tidak boleh kosong',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        // update seo
        $site = Setting::first();
        $site->seo = json_encode($request->all());
        $site->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mengubah data',
            'redirect' => 'reload'
        ]);
    }
}
