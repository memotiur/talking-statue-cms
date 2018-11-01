<?php

namespace App\Http\Controllers;

use App\City;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{

    public function index()
    {
        $cities = City::get();
        return view('admin.places.new_place')->with('city', $cities);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

          $days_value =
            $request->input('saturday_opening_time') . "-" . $request->input('saturday_closing_time') . "," .
            $request->input('sunday_opening_time') . "-" . $request->input('sunday_closing_time') . "," .
            $request->input('monday_opening_time') . "-" . $request->input('monday_closing_time') . "," .
            $request->input('tuesday_opening_time') . "-" . $request->input('tuesday_closing_time') . "," .
            $request->input('wednesday_opening_time') . "-" . $request->input('wednesday_closing_time') . "," .
            $request->input('thursday_opening_time') . "-" . $request->input('thursday_closing_time') . "," .
            $request->input('friday_opening_time') . "-" . $request->input('friday_closing_time');

        /* if($request->input('sunday')==null){
             echo"null";
         }else{
             echo"value";
         }
         return;*/
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $image_name = "place_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = "default.jpg";
        }

        $place_array = array(
            'place_name' => $request->input('place_name'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'city_id' => $request->input('city_id'),
            'open_time' => $request->input('open_time'),
            'place_address' => $request->input('place_address'),
            'close_time' => $request->input('close_time'),
            'details' => $request->input('details'),
            'place_web_url' => $request->input('place_web_url'),
            'opening_weekdays' => $days_value,
            'place_image' => $image_name
        );

        try {
            Place::create($place_array);
            return back()->with('success', 'Successfully inserted');
        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There wa an error' . $e->getMessage());
        }

    }


    public function show(Place $place)
    {
        $result = DB::table('places')
            ->join('cities', 'places.city_id', '=', 'cities.city_id')
            ->get();

        return view('admin.places.view_place')->with('result', $result);
    }


    public function edit($id)
    {
        $cities = City::get();
        $result = DB::table('places')->where('place_id', $id)->first();
        return view('admin.places.edit_place')->with('result', $result)->with('city', $cities);
    }


    public function update(Request $request)
    {
       // return $request->all();
        /*
                $days_value = $request->input('saturday') ."-".$request->input('saturday_opening_time')."-".$request->input('saturday_closing_time')."," .
                    $request->input('sunday')  ."-".$request->input('sunday_opening_time')."-".$request->input('sunday_closing_time')."," .
                    $request->input('monday') ."-".$request->input('monday_opening_time')."-".$request->input('monday_closing_time')."," .
                    $request->input('tuesday') ."-".$request->input('tuesday_opening_time')."-".$request->input('tuesday_closing_time')."," .
                    $request->input('wednesday')."-".$request->input('wednesday_opening_time')."-".$request->input('wednesday_closing_time')."," .
                    $request->input('thursday') ."-".$request->input('thursday_opening_time')."-".$request->input('thursday_closing_time')."," .
                    $request->input('friday')."-".$request->input('friday_opening_time')."-".$request->input('friday_closing_time');*/

        $days_value =
            $request->input('saturday_opening_time') . "-" . $request->input('saturday_closing_time') . "," .
            $request->input('sunday_opening_time') . "-" . $request->input('sunday_closing_time') . "," .
            $request->input('monday_opening_time') . "-" . $request->input('monday_closing_time') . "," .
            $request->input('tuesday_opening_time') . "-" . $request->input('tuesday_closing_time') . "," .
            $request->input('wednesday_opening_time') . "-" . $request->input('wednesday_closing_time') . "," .
            $request->input('thursday_opening_time') . "-" . $request->input('thursday_closing_time') . "," .
            $request->input('friday_opening_time') . "-" . $request->input('friday_closing_time');

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $image_name = "place_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = $request['place_image'];
        }

        $place_array = array(
            'place_name' => $request->input('place_name'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'city_id' => $request->input('city_id'),
            'open_time' => $request->input('open_time'),
            'close_time' => $request->input('close_time'),
            'details' => $request->input('details'),
            'place_web_url' => $request->input('place_web_url'),
            'place_address' => $request->input('place_address'),
            'opening_weekdays' => $days_value,
            'place_image' => $image_name
        );


        try {
            Place::where('place_id', $request['place_id'])->update($place_array);
            return back()->with('success', 'Successfully updated');
        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There was an error' . $e->getMessage());
        }

    }


    public function destroy($id)
    {
        try {
            DB::table('places')->where('place_id', $id)->delete();
            return back()->with('success', "Deleted successfully");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem");
        }

    }
}
