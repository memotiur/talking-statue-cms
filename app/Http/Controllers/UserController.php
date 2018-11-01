<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function show()
    {
        $result = User::where('user_type', '2')->get();
        return view('admin.user.view_users')->with('result', $result);
    }

    public function showCmsusers()
    {
        $result = User::where('user_type', '1')->get();
        return view('admin.cms_user.view_users')->with('result', $result);
    }

    public function newCmsusers()
    {

        return view('admin.cms_user.new_cms_user');
    }

    public function editCmsUser($id)
    {
        return view('admin.cms_user.edit_cms_user')->with('result', User::where('id', $id)->first());
    }
    public function deleteCmsUser($id)
    {
        try{
            User::where('id', $id)->delete();
            return back()->with("success", "Successfully deleted");
        }catch (\Exception $exception){
            return back()->with("decline", "Try again later." . $exception->getMessage());
        }

    }

    public function saveCmsUser(Request $request)
    {

        //return $request->all();
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $age = $request['age'];
        $city = $request['city'];
        $mobile_number = $request['mobile_number'];
        /*        $facebook = $request['facebook'];
                $google = $request['google'];*/
        try {
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'user_type' => '1',
                'age' => $age,
                'city' => $city,
                'mobile_number' => $mobile_number,
                /*     'facebook' => $facebook,
                     'google' => $google,*/
                'status' => (true),
            ]);
            return back()->with("success", "Successfully added");
        } catch (\Exception $e) {
            return back()->with("decline", "Try again later." . $e->getMessage());
        }

    }
    public function updateCmsUser(Request $request)
    {

        //return $request->all();
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $age = $request['age'];
        $city = $request['city'];
        $mobile_number = $request['mobile_number'];
        $id = $request['id'];
        /*        $facebook = $request['facebook'];
                $google = $request['google'];*/
        try {
            DB::table('users')->where('id',$id)->update([
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'age' => $age,
                'city' => $city,
                'mobile_number' => $mobile_number,
                /*     'facebook' => $facebook,
                     'google' => $google,*/
                'status' => (true),
            ]);
            return back()->with("success", "Successfully added");
        } catch (\Exception $e) {
            return back()->with("decline", "Try again later." . $e->getMessage());
        }

    }

    public function deactivate($id)
    {
        try {

            User::where('id', $id)->update(array('status' => 0));
            return back()->with('success', "Deactivated");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }
    }

    public function reactivate($id)
    {
        try {
            User::where('id', $id)->update(array('status' => 1));
            return back()->with('success', "Deactivated");
        } catch (\Exception $exception) {
            return back()->with('decline', "There was a problem" . $exception->getMessage());
        }
    }

    public function appUserIndex(){
        return view('admin.user.new_app_user');
    }
    public function appuserSave(Request $request){
        //return $request->all();
        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $age = $request['age'];
        $city = $request['city'];
        $mobile_number = $request['mobile_number'];
        /*        $facebook = $request['facebook'];
                $google = $request['google'];*/
        try {
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'user_type' => '2',
                'age' => $age,
                'city' => $city,
                'mobile_number' => $mobile_number,
                /*     'facebook' => $facebook,
                     'google' => $google,*/
                'status' => (true),
            ]);
            return back()->with("success", "Successfully added");
        } catch (\Exception $e) {
            return back()->with("decline", "Try again later." . $e->getMessage());
        }
    }

    public function editAppUser($id)
    {
        return view('admin.user.edit_app_user')->with('result', User::where('id', $id)->first());
    }
    public function deleteAppUser($id)
    {
        try{
            User::where('id', $id)->delete();
            return back()->with("success", "Successfully deleted");
        }catch (\Exception $exception){
            return back()->with("decline", "Try again later." . $exception->getMessage());
        }

    }
}
