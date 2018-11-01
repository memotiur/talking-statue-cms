<?php

namespace App\Http\Controllers;

use App\City;
use App\Place;
use App\Statue;
use App\Template;
use App\TopSlideImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopSlideImageController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {

        return view("admin.slideimage.new_sponsor_logo")
            ->with('places', Place::get())
            ->with('statues', Statue::get())
            ->with('templates', Template::get())
            ->with('cities', City::get());
    }

    public function store(Request $request)
    {
        //return $request->all();
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $image_name = "spons_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = "default.jpg";
        }
        if($request->input('option')=="Place"){
            $insert_array=array('image_url' => $image_name,'place_id'=>$request->input('place'),'city_id'=>$request->input('city_id'));
        }else if($request->input('option')=="Statue"){
            $insert_array=array('image_url' => $image_name,'statue_id'=>$request->input('statue'),'city_id'=>$request->input('city_id'));
        }else if($request->input('option')=="Template"){
            $insert_array=array('image_url' => $image_name,'template_id'=>$request->input('template'),'city_id'=>$request->input('city_id'));
        }else{
            $insert_array=array('image_url' => $image_name,'top_slidd_url'=>$request->input('top_slidd_url'),'city_id'=>$request->input('city_id'));
        }


        //return $insert_array;

        try {
            TopSlideImage::create($insert_array);
            return back()->with('success', "Succesfully Sponsor logo updated");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }
    }

    public function show()
    {


       // return $result = DB::table('top_slide_images')->get();
        $result = DB::table('top_slide_images')
            ->leftjoin('templates', 'templates.template_id', '=', 'top_slide_images.template_id')
            ->leftjoin('statues', 'statues.statue_id', '=', 'top_slide_images.statue_id')
            ->leftjoin('places', 'places.place_id', '=', 'top_slide_images.place_id')
            ->join('cities', 'top_slide_images.city_id', '=', 'cities.city_id')
            ->get();
        return view("admin.slideimage.view_sponsor_logo")->with('result', $result);
    }

    public function edit($id)
    {
        //return $result = TopSlideImageController::get();

        $result = DB::table('top_slide_images')->where('top_logo_id', $id)->first();
        return view("admin.slideimage.edit_sponsor_logo")->with('result', $result) ->with('places', Place::get())
            ->with('statues', Statue::get())
            ->with('templates', Template::get())
            ->with('cities', City::get());
    }

    public function update(Request $request)
    {

        //return $request->all();
        $id = $request->input('id');
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $image_name = "spons_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = $request->input('image_name');
        }
        if($request->input('option')=="place"){
            $insert_array=array(
                'image_url' => $image_name,
                'city_id' => $request->input('city_id'),
                'place_id'=>$request->input('place')
            );
        }else if($request->input('option')=="statue"){
            $insert_array=array('image_url' => $image_name,
                'city_id' => $request->input('city_id'),
                'statue_id'=>$request->input('statue'));
        }else if($request->input('option')=="statue"){
            $insert_array=array('image_url' => $image_name,
                'city_id' => $request->input('city_id'),
                'template_id'=>$request->input('template'));
        }else{
            $insert_array=array('image_url' => $image_name,'top_slidd_url'=>$request->input('top_slidd_url'));
        }

        //$insert_array->city_id=$request->input('city_id');

        try {
            TopSlideImage::where('top_logo_id', $id)->update($insert_array);
            return back()->with('success', "Succesfully Sponsor logo updated");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TopSlideImage $sponsorLogo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table('top_slide_images')->where('top_logo_id', $id)->delete();
            return back()->with('success', "Successfully Deleted");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }
    }
}
