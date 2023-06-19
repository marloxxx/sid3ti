<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $sliders = Slider::all();
        // get all member where birthday is today
        $members = Member::where('date_of_birth', 'like', '%' . Carbon::now()->format('m-d') . '%')->get();
        $mens = Member::where('gender', 'Men')->count();
        $women = Member::where('gender', 'Women')->count();
        return view('pages.frontend.home.index', compact('sliders', 'members'));
    }
}
