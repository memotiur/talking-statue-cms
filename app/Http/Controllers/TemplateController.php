<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.template.new_template');
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


    public function store(Request $request)
    {
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
        if ($request->hasFile('image2')) {
            $this->validate($request, [
                'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image2 = $request->file('image2');
            $image_name2 = time() . '2.' . $image2->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image2->move($destinationPath, $image_name2);
        } else {
            $image_name2 = "default.jpg";
        }

        if ($request->hasFile('audio_url')) {

            $audio = $request->file('audio_url');
            $audio_name = time() . '.' . $audio->getClientOriginalExtension();
            $destinationPath = public_path('/audio');
            $audio->move($destinationPath, $audio_name);
        } else {
            $audio_name = null;
        }


        $array = array(
            'templates_name' => $request->input('templates_name'),
            'templates_description' => $request->input('templates_description'),
            'audio_url' => $audio_name,
            'video_url' => $request->input('video_url'),
            'video_description' => $request->input('video_description'),
            'templates_image' => $image_name,
            'templates_image2' => $image_name2

        );
        //DB::table('statues')->insert($array);

        try {
            Template::create($array);
            return back()->with('success', 'Successfully inserted');
        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There wa an error' . $e->getMessage());
        }
    }


    public function show()
    {
        $result = Template::get();
        return view('admin.template.view_template')->with('result', $result);
    }


    public function edit($id)
    {
        return view('admin.template.edit_template')->with('result', Template::where('template_id', $id)->first());
    }

    public function update(Request $request)
    {
        $get_image=Template::where('template_id', $request->template_id)->first();
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

            $image_name = $get_image->templates_image;
        }
        if ($request->hasFile('image2')) {
            $this->validate($request, [
                'image2' => 'required|imagel|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image2 = $request->file('image2');
            $image_name2 = time() . '2.' . $image2->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image2->move($destinationPath, $image_name2);
        } else {

            $image_name2 = $get_image->templates_image2;
        }

        if ($request->hasFile('audio_url')) {

            $audio = $request->file('audio_url');
            $audio_name = time() . '.' . $audio->getClientOriginalExtension();
            $destinationPath = public_path('/audio');
            $audio->move($destinationPath, $audio_name);
        } else {
            $audio_name = $get_image->audio_url;
        }


        $array = array(
            'templates_name' => $request->input('templates_name'),
            'templates_description' => $request->input('templates_description'),
            'audio_url' => $audio_name,
            'video_url' => $request->input('video_url'),
            'video_description' => $request->input('video_description'),
            'templates_image' => $image_name,
            'templates_image2' => $image_name2

        );
        //DB::table('statues')->insert($array);

        try {
            Template::where('template_id', $request->template_id)->update($array);
            return back()->with('success', 'Successfully updated');
        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There wa an error' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            Template::where('template_id', $id)->delete();
            return back()->with('success', 'Successfully deleted');
        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There wa an error' . $e->getMessage());
        }
    }
}
