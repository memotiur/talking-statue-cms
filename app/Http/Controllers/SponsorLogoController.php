<?php

namespace App\Http\Controllers;

use App\City;
use App\SponsorLogo;
use App\TopSlideImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorLogoController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        $cities=City::get();
        return view("admin.sponsorlogo.new_sponsor_logo")->with("cities",$cities);
    }


    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $image_name = "topslide" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = "default.jpg";
        }

        try {
            SponsorLogo::create(
                array(
                'image_url' => $image_name,
                'city_id' => $request->city_id,
                'sponsor_logo_web_url'=>$request->sponsor_logo_web_url
                ));
            return back()->with('success', "Succesfully Sponsor logo updated");
        } catch (\Exception $exception) {

            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }
    }


    public function show()
    {

        //return $result = SponsorLogoController::get();
        $result = DB::table('sponsor_logos')
            ->join('cities', 'sponsor_logos.city_id', '=', 'cities.city_id')
            ->get();
        return view("admin.sponsorlogo.view_sponsor_logo")->with('result', $result);
    }


    public function edit($id)
    {
        //return $result = SponsorLogoController::get();
        $cities=City::get();
        $result = DB::table('sponsor_logos')->where('sponsor_logo_id', $id)->first();
        return view("admin.sponsorlogo.edit_sponsor_logo")->with('result', $result)->with('cities',$cities);
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $sponsor_logo_web_url = $request->input('sponsor_logo_web_url');
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $image_name = "topslide" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = $request->input('image_name');
        }
        try {
            SponsorLogo::where('sponsor_logo_id', $id)->update(array(
                'image_url' => $image_name,
                'city_id' => $request->city_id,
                'sponsor_logo_web_url'=>$sponsor_logo_web_url));
            return back()->with('success', "Succesfully Sponsor logo updated");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }

    }


    public function destroy($id)
    {
        try {
            DB::table('sponsor_logos')->where('sponsor_logo_id', $id)->delete();
            return back()->with('success', "Successfully Deleted");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }
    }
}
