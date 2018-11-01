<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.faq.new_faq');
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

        unset($request['_token']);      // remove item
        try {
            Faq::create($request->all());
            return back()->with("success", "Successfully added");
        } catch (\Exception $e) {
            // return $e->getMessage();
            return back()->with("decline", "Try again later.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        $result = Faq::get();
        return view('admin.faq.view_faq')->with('result', $result);
    }

    public function edit($id)
    {
        $result = Faq::where('faq_id', $id)->first();
        return view('admin.faq.edit_faq')->with('result', $result);
    }

    public function update(Request $request)
    {
        unset($request['_token']);
        $id = $request->input('id');
        unset($request['id']);
        try {
            Faq::where('faq_id', $id)->update($request->all());
            return back()->with("success", "Successfully updated");
        } catch (\Exception $e) {
            //return $e->getMessage();
            return back()->with("decline", "Try again later.");
        }
    }

    public function destroy($id)
    {
        try {
            Faq::where('faq_id', $id)->delete();
            return back()->with('success', "Successfully deleted");
        } catch (\Exception $e) {
            return back()->with('decline', "There was an Error");
        }
    }
}
