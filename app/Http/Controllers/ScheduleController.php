<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Schedule::all())
                ->addIndexColumn()
                ->addColumn('action', function ($schedule) {
                    return '<div class="btn-group" role="group">
                        <a href="' . route('backend.schedule.edit', $schedule->id) . '" class="btn btn-warning">
                            <i class="fas fa-solid fa-pen-to-square"></i>
                        </a>
                        <a href="javascript:;" onclick="handle_confirm(\'Apakah Anda Yakin?\',\'Yakin\',\'Tidak\',\'DELETE\',\'' . route('backend.schedule.destroy', $schedule->id) . '\');" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.backend.schedule.index');
    }

    public function schedule(Request $request)
    {
        $schedules = Schedule::all();

        $schedules = $schedules->map(fn ($schedule) => [
            'id' => $schedule->id,
            'day' => $schedule->day,
            'title' => $schedule->title,
            'start' => Carbon::parse($schedule->day)->subDays(Carbon::now()->diffInDays($schedule->day) > 0 ? 7 : 0)->format('Y-m-d') . ' ' . $schedule->start,
            'end' => Carbon::parse($schedule->day)->subDays(Carbon::now()->diffInDays($schedule->day) > 0 ? 7 : 0)->format('Y-m-d') . ' ' . $schedule->end,
            'room' => $schedule->room,
        ]);


        return view('pages.frontend.schedule.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::Make($request->all(), [
            'day' => 'required',
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'room' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        Schedule::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Schedule created',
            'redirect' => route('backend.schedule.index'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        return view('pages.backend.schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validator = Validator::Make($request->all(), [
            'day' => 'required',
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'room' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $schedule->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Schedule updated',
            'redirect' => route('backend.schedule.index'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Schedule deleted',
        ]);
    }
}
