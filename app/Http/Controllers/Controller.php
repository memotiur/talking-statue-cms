<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function resetPassword($id)
    {

        return view('password_reset.reset_password')->with('id', $id);
    }

    function decrypt($input)
    {
        return base64_decode(strtr($input, '._-', '+/='));
    }

    public function savePassword(Request $request)
    {
        $id = $request['id'];
        $id = $this->decrypt($id);
        $password = $request['password'];

        $request->validate([
            'password' => 'required|max:255',
        ]);

        try {
            User::where('id', $id)->update(['password' => md5($password)]);
            return Redirect::to('/pass-update');

        } catch (\Exception $exception) {
            return Redirect::to('/pass-update')->with('decline', "There was an error. Please contact with admin");
        }

    }
}
