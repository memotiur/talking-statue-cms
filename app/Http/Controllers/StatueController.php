<?php

namespace App\Http\Controllers;

use App\City;
use App\Statue;
use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class StatueController extends Controller
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
        $city = City::get();
        $templates = Template::get();
        return view('admin.statue.new_statue')
            ->with('city', $city)
            ->with('templates', $templates);
    }


    public function store(Request $request)
    {
        if ($request->input('range_radius') > 2000 OR $request->input('range_radius') < 1) {
            return back()->with('decline', 'Range Radius must be less than 2000');
        }


        //return;
        //return $request->all();

        if ($request['audio_url'] == null AND $request['web_address'] == null) {
            return back()->with('decline', 'Audio and Web URL both can not be null');
        }
        if ($request['gps_on'] == 0 AND $request['qr_code_on'] == 0) {
            return back()->with('decline', 'Please Make GPS on OR QR Code on');
        }
        //return $request->all();
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = "default.jpg";
        }

        if ($request->hasFile('audio_url')) {

            $image = $request->file('audio_url');
            $audio_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/audio');
            $image->move($destinationPath, $audio_name);
        } else {
            $audio_name = null;
        }


        $array = array(
            'statue_name' => $request->input('statue_name'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'image' => $image_name,
            'audio_url' => $audio_name,
            'range_radius' => $request->input('range_radius'),
            'description' => $request->input('description'),
            'web_address' => $request->input('web_address'),
            'qr_code' => $request->input('qr_code'),
            'template_id' => $request->input('template_id'),

            'qr_code_on' => $request->input('qr_code_on'),
            'gps_on' => $request->input('gps_on'),
            'statue_active' => $request->input('statue_active'),
            'keywords' => $request->input('keywords')
        );
        //DB::table('statues')->insert($array);

        try {
            Statue::create($array);
            return back()->with('success', 'Successfully inserted');
        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There wa an error' . $e->getMessage());
        }

    }


    public function show(Statue $statue)
    {
        //$result = Statue::get();
        $result = DB::table('statues')
            ->join('cities', 'statues.city', '=', 'cities.city_id')
            //->join('templates', 'statues.template_id', '=', 'templates.template_id')
            ->get();
        return view('admin.statue.view_statue')->with('result', $result);

    }

    public function delete($id)
    {
        try {
            DB::table('statues')
                ->where('statue_id', $id)
                ->delete();
            return back()->with('success', "Deleted");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }


    }


    public function edit($id)
    {

        //return Statue::where('statue_id', $id)->get();
        return view('admin.statue.edit_statue')
            ->with('result', Statue::where('statue_id', $id)->first())
            ->with('city', City::get())
            ->with('templates', Template::get());
    }


    public function editSave(Request $request)
    {
        if ($request->input('range_radius') > 2000 OR $request->input('range_radius') < 1) {
            return back()->with('decline', 'Range Radius must be less than 2000');
        }
        if ($request['gps_on'] == 0 AND $request['qr_code_on'] == 0) {
            return back()->with('decline', 'Please Make GPS on OR QR Code on');
        }

        $statue_value = Statue::where('statue_id', $request->statue_id)->first();
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = $statue_value->image;
        }

        if ($request->hasFile('audio_url')) {

            $image = $request->file('audio_url');
            $audio_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/audio');
            $image->move($destinationPath, $audio_name);
        } else {
            $audio_name = $statue_value->audio_url;
        }


        $array = array(
            'statue_name' => $request->input('statue_name'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'image' => $image_name,
            'audio_url' => $audio_name,
            'range_radius' => $request->input('range_radius'),
            'description' => $request->input('description'),
            'web_address' => $request->input('web_address'),
            'template_id' => $request->input('template_id'),
            'qr_code' => $request->input('qr_code'),

            'qr_code_on' => $request->input('qr_code_on'),
            'gps_on' => $request->input('gps_on'),
            'statue_active' => $request->input('statue_active'),
            'keywords' => $request->input('keywords')
        );
        //DB::table('statues')->insert($array);

        try {
            Statue::where('statue_id', $request->statue_id)->update($array);
            return back()->with('success', 'Successfully updated');
        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There wa an error' . $e->getMessage());
        }
    }


    public function destroy(Statue $statue)
    {
        //
    }


    //Manage City
}
