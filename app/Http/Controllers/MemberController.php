<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Intervention\Image\Facades\Image;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
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
        $this->setMeta('Member');
        if ($request->ajax()) {
            return DataTables::of(Member::query())
                ->editColumn('fullname', function ($member) {
                    return '<!--begin:: Avatar -->
                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                        <a href="javascript:;">
                            <div class="symbol-label">
                                <img src="../images/avatar/' . $member->photo . '" alt="avatar"
                                    class="w-100" />
                            </div>
                        </a>
                    </div>
                    <!--end::Avatar-->
                    <!--begin::User details-->
                    <div class="d-flex flex-column">
                        <a href="javascript:;"
                            class="text-gray-800 text-hover-primary mb-1">' . $member->fullname . '</a>
                    </div>
                    <!--begin::User details-->';
                })
                ->addColumn('action', function ($member) {
                    return '<div class="btn-group" role="group">
                        <a href="' . route('backend.member.edit', $member->id) . '" class="btn btn-warning">
                            <i class="fas fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="javascript:;" onclick="handle_confirm(\'Apakah Anda Yakin?\',\'Yakin\',\'Tidak\',\'DELETE\',\'' . route('backend.member.destroy', $member->id) . '\');" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>';
                })
                ->rawColumns(['fullname', 'action'])
                ->make(true);
        }
        return view('pages.backend.member.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $searchTerm = $request->search;

            $members = Member::where(function ($query) use ($searchTerm) {
                $query->where('fullname', 'like', '%' . $searchTerm . '%')
                    ->orWhere('nim', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%');
            })->orderBy('nim', 'asc')->get();

            return view('pages.frontend.member.list.list', compact('members'));
        }
        return view('pages.frontend.member.list.index');
    }

    public function birthday()
    {
        // Get current date
        $currentDate = Carbon::now();

        // Get 7 days later
        $nextDate = $currentDate->copy()->addDays(7);

        // Initialize array to store members
        $members = [];

        // Loop through each day within the next 7 days
        for ($i = 0; $i < 7; $i++) {
            // Get the date in the format 'd F'
            $date = $currentDate->addDays($i)->format('d F');

            // Get members with a birthday on the current date
            $members[$i]['date'] = $date;
            $members[$i]['members'] = Member::where('date_of_birth', '>=', $currentDate)
                ->where('date_of_birth', '<', $currentDate->copy()->addDay())
                ->get();
        }
        return view('pages.frontend.member.birthday.index', compact('members'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required|numeric',
            'nim' => 'required|unique:members,nim',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'family' => 'required',
            'instagram' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        $file = $request->file('avatar');
        $name = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/images/avatar');
        // resize
        $resize_image = Image::make($file->getRealPath());
        $resize_image->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $name);

        $file->move(public_path('/images/photo/'), $name);

        $request->merge(['photo' => $name]);

        Member::create($request->except('_token', 'avatar_remove', 'avatar'));

        return response()->json([
            'status' => 'success',
            'message' => 'Member created',
            'redirect' => route('backend.member.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('pages.frontend.member.list.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('pages.backend.member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'phone' => 'required|numeric',
            'nim' => 'required|unique:members,nim,' . $member->id,
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'family' => 'required',
            'instagram' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        if ($request->hasFile('avatar')) {
            // if image exist then delete
            if ($member->avatar) {
                $file = public_path('/images/avatar/' . $member->photo);
                if (file_exists($file)) {
                    unlink($file);
                }
                $file = public_path('/images/photo/' . $member->photo);
                if (file_exists($file)) {
                    unlink($file);
                }
            }

            $validator = Validator::make($request->all(), [
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first(),
                ]);
            }

            $file = $request->file('avatar');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/images/avatar');
            // resize
            $resize_image = Image::make($file->getRealPath());
            $resize_image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $name);
            $file->move(public_path('/images/photo/'), $name);
        } else {
            $name = $member->photo;
        }
        $request->merge(['photo' => $name]);

        $member->update($request->except('_token', 'avatar_remove', 'avatar'));

        return response()->json([
            'status' => 'success',
            'message' => 'Member updated',
            'redirect' => route('backend.member.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        // if image exist then delete
        if ($member->photo) {
            $file = public_path('/images/avatar/' . $member->photo);
            if (file_exists($file)) {
                unlink($file);
            }
            $file = public_path('/images/photo/' . $member->photo);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $member->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Member deleted',
        ]);
    }
}
