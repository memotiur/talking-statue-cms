<?php

namespace App\Http\Controllers;

use App\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return $result=ActivityLog::count();

        $result = DB::table('activity_logs')
            ->Join('users', 'activity_logs.user_id', '=', 'users.id')
            ->Join('statues', 'activity_logs.statue_id', '=', 'statues.statue_id')
            //->select('statues.statue_name','statues.statue_id','users.name','activity_logs.created_at','activity_logs.statue_id')
            ->get();
        return view('admin.activity.view')->with('result', $result);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActivityLog $activityLog
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityLog $activityLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ActivityLog $activityLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityLog $activityLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ActivityLog $activityLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityLog $activityLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActivityLog $activityLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityLog $activityLog)
    {
        //
    }
}
