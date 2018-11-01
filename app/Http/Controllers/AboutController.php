<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.about.view_about')->with('result', About::first());
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
     * @param  \App\About $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.about.edit_about')->with('result', About::first());
    }

    public function update(Request $request, About $about)
    {
        //return $request->input('details');
        try {
            About::where('about_id', $request->input('about_id'))->update(array('details' => $request->input('details')));
            return back()->with('success', 'Successfully updated');
        } catch (\Exception $exception) {
            return back()->with('decline', 'There wa an error' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
