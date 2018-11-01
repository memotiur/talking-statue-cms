<?php

namespace App\Http\Controllers;

use App\Selfies;
use Illuminate\Http\Request;

class SelfiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Selfies $selfies
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $result = Selfies::get();
        return view('admin.selfie.view_selfie')->with('result', $result);
    }

    public function spamReported($id)
    {
        $value = 1;
        $res = Selfies::where('selfie_id', $id)->first();
        if ($res->status == 1) {
            $value = 0;
        }
        try {
            Selfies::where('selfie_id', $id)->update(array('status' => $value));
            return back()->with('success', "Updated");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Selfies $selfies
     * @return \Illuminate\Http\Response
     */
    public function edit(Selfies $selfies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Selfies $selfies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Selfies $selfies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Selfies $selfies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Selfies $selfies)
    {
        //
    }
}
