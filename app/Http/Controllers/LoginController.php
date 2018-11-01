<?php

namespace App\Http\Controllers;

use App\User;
use App\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user_id = $request->session()->get('user_id');
            $user_type = $request->session()->get('user_type');
            if ($user_type == '1') {
                return redirect('/admin-home')->send();
            }
            return $next($request);
        });
    }

    public function login()
    {
        return view('login');
    }

    public function loginCheck(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');

        $password = md5($password);
        //$result=DB::table('users')->where('email', $email)->where('password', $password)->first();
        $result = User::where('email', $email)
            ->where('password', $password)
            ->first();
        if ($result) {
            $request->session()->put('user_id', $result->id);
            $request->session()->put('name', $result->name);
            $request->session()->put('user_type', $result->user_type);
            session('user_id');

            return Redirect('/admin-home')->with('success', 'success');

        } else {
            return Redirect('/login')->with('decline', 'User id or password is wrong.');
        }


    }


}
