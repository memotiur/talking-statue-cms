<?php

namespace App\Http\Controllers;

use App\City;
use App\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.reward.new_reward')->with('cities', City::get());
    }


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
            $image_name = "place_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = "default.jpg";
        }

        $reward_array = array(
            'reward_name' => $request->input('reward_name'),
            'reward_image' => $image_name,
            'reward_city' => $request->input('reward_city'),
            'reward_url' => $request->input('reward_url'),
            'valid_period' => $request->input('valid_period')

        );

        try {
            if (is_null(Reward::where('reward_city', $request->input('reward_city'))->where('active_status', '1')->first())) {

                Reward::create($reward_array);
                return back()->with('success', 'Successfully inserted');
            } else {
                return back()->with('decline', 'Already Exist');
            }

        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There was an error' . $e->getMessage());
        }
    }


    public function show(Reward $reward)
    {
        $result = DB::table('rewards')
            ->join('cities','cities.city_id','=','rewards.reward_city')
            ->get();
        return view('admin.reward.view_reward')->with('result', $result);
    }


    public function edit($id)
    {
        $result = Reward::where('reward_id', $id)->first();
        return view('admin.reward.edit_reward')->with('result', $result)->with('cities', City::get());
    }


    public function update(Request $request)
    {
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $image_name = "place_" . time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = $request['reward_image'];
        }

        $reward_array = array(
            'reward_name' => $request->input('reward_name'),
            'reward_image' => $image_name,
            'reward_city' => $request->input('reward_city'),
            'reward_url' => $request->input('reward_url'),
            'valid_period' => $request->input('valid_period')

        );


        try {
            Reward::where('reward_id', $request['reward_id'])->update($reward_array);
            return back()->with('success', 'Successfully updated');
        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There was an error' . $e->getMessage());
        }
    }
    public function makeActive($reward_id,$active_stat)
    {

        $reward_array = array(
            'active_status' => $active_stat

        );


        try {
            Reward::where('reward_id', $reward_id)->update($reward_array);
            return back()->with('success', 'Successfully updated');
        } catch (\Exception $e) {

            //return $e->getMessage();
            return back()->with('decline', 'There was an error' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            DB::table('rewards')->where('reward_id', $id)->delete();
            return back()->with('success', "Deleted successfully");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem");
        }
    }

    public function reedemRewardShow()
    {
        $results = DB::table('redeem_awards')
            ->join('users', 'users.id', '=', 'redeem_awards.user_id')
            ->join('cities', 'cities.city_id', '=', 'redeem_awards.city_id')
            ->join('rewards', 'rewards.reward_id', '=', 'redeem_awards.reward_id')
            ->select('cities.name as city_name','rewards.reward_name','users.name','redeem_awards.created_at','rewards.valid_period','redeem_awards.serial_number','redeem_awards.redeem_date')
            ->get();
        return view('admin.redeem_rewrad.view_redeem_awards')->with('result', $results);
    }
}
