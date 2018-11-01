<?php

namespace App\Http\Controllers;

use App\City;
use App\Selfies;
use App\Statue;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            echo $user_id = $request->session()->get('user_id');
            $user_type = $request->session()->get('user_type');
            if ($user_id == NULL AND $user_type != 1) {
                return redirect::to('/login')->send();
            }
            return $next($request);
        });
    }

    public function adminHome()
    {
        $statues= Statue::count();
        $users= User::count();
        $cities= City::count();
        $selfies= Selfies::count();
        return view('admin.admin_home')
            ->with('statues',$statues)
            ->with('users',$users)
            ->with('cities',$cities)
            ->with('citiess',City::get())
            ->with('statuess',Statue::get())
            ->with('selfies',$selfies);
    }

    public function logout()
    {
        session()->forget('user_id');
        session()->forget('institute_id');
        session()->forget('user_type');
        session()->forget('user_email');
        session()->forget('user_designation');
        session()->forget('user_full_name');
        session()->flush();
        //return 0;
        return Redirect::to('/login')->send();

    }

    public function setting()
    {
        //return $request->session()->get('user_id');
        $result = User::where('id', session('user_id'))->first();
        return view('admin.settings.setting')->with('result', $result);
    }

    public function settingUpdate(Request $request)
    {
        unset($request['_token']);
        try {
            User::where('id', session('user_id'))->update($request->all());
            return back()->with('success', "Updated");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem");
        }


    }

}
