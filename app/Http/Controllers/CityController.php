<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $user_id = $request->session()->get('user_id');
            $user_type = $request->session()->get('user_type');
            if ($user_id == NULL AND $user_type != 1) {
                return redirect::to('/login')->send();
            }
            return $next($request);
        });
    }

    public function index()
    {
        return view('admin.city.new_city');
    }

    public function store(Request $request)
    {
        unset($request['_token']);      // remove item
        try {
            City::create($request->all());
            return back()->with("success", "Successfully added");
        } catch (\Exception $e) {
            return back()->with("decline", "Try again later.");
        }

    }
    public function editedSave(Request $request)
    {
        $id=$request['city_id'];
        unset($request['_token']);      // remove item
        unset($request['city_id']);      // remove item
        try {
            City::where('city_id',$id)->update($request->all());
            return back()->with("success", "Successfully updated");
        } catch (\Exception $e) {
            return back()->with("decline", "Try again later.".$e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $result = City::get();
        return view('admin.city.view_city')->with("result", $result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = City::where('city_id',$id)->first();
        return view('admin.city.edit_city')->with("result", $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    public function destroy($city_id)
    {
        try{
            City::where('city_id',$city_id)->delete();
            return back()->with('success',"Successfully deleted");
        }catch(\Exception $e){
            return back()->with('decline',"There was an Error");
        }

    }
}
