<?php

namespace App\Http\Controllers;

use App\Activities;
use App\ActivityLog;
use App\Place;
use App\RedeemAward;
use App\Reward;
use App\Selfies;
use App\SponsorLogo;
use App\Statue;
use App\Template;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function SignUp(Request $request)
    {
        $status = "success";
        $message = "";
        $result = "";
        $code = "0";

        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $age = $request['age'];
        $city = $request['city'];
        $mobile_number = $request['mobile_number'];
        $facebook = $request['facebook'];
        $google = $request['gmail'];
        $update_array = array(
            'name' => $name,
            'email' => $email,
            'password' => md5($password),
            'user_type' => ('2'),
            'age' => $age,
            'city' => $city,
            'mobile_number' => $mobile_number,
            'facebook' => $facebook,
            'google' => $google,
            'status' => (true),
        );
        try {
            DB::table('users')->insert($update_array);
        } catch (\Exception $e) {
            $status = "failed";
            $code = "404";
            $message = $e->getMessage();
        }

        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $update_array,
        ];
        return $data;
    }

    public function updateProfile(Request $request)
    {
        $status = "success";
        $message = "";
        $result = "";
        $code = "0";

        $name = $request['name'];
        $email = $request['email'];
        $password = $request['password'];
        $age = $request['age'];
        $city = $request['city'];
        $mobile_number = $request['mobile_number'];
        $facebook = $request['facebook'];
        $google = $request['gmail'];
        $user_id = $request['user_id'];
        if (empty($password)) {
            $update_array = array(
                'name' => $name,
                'email' => $email,
                'user_type' => ('2'),
                'age' => $age,
                'city' => $city,
                'mobile_number' => $mobile_number,
                'facebook' => $facebook,
                'google' => $google,
                'status' => (true),
            );
        } else {
            $update_array = array(
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'user_type' => ('2'),
                'age' => $age,
                'city' => $city,
                'mobile_number' => $mobile_number,
                'facebook' => $facebook,
                'google' => $google,
                'status' => (true),
            );
        }

        //return $update_array;
        //return $user_id;

        try {
            DB::table('users')->where('id', $user_id)->update($update_array);
        } catch (\Exception $e) {
            $status = "failed";
            $code = "404";
            $message = $e->getMessage();
        }

        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $update_array,
        ];
        return $data;
    }

    public function facebookSignIn(Request $request)
    {
        $message = "";
        $code = "0";
        $status = "failed";
        $result = null;
        $email = $request['email'];
        $name = $request['name'];
        $null = false;
        if ($email != null) {
            $result = User::where('facebook', $email)
                ->first();
            if (is_null($result)) {
                $null = true;
                try {
                    DB::table('users')->insert([
                        'name' => $name,
                        'facebook' => $email,
                        'user_type' => 2,
                        'status' => (true),
                    ]);
                } catch (\Exception $e) {
                    $code = "404";
                    $message = $e->getMessage();
                }
            }
            $status = "success";
        }
        if ($null) {
            $result = User::where('facebook', $email)
                ->first();
        }

        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function SignIn(Request $request)
    {
        $message = "";
        $code = "0";
        $status = "failed";
        $result = null;
        $email = $request['email'];
        $password = $request['password'];
        $password = md5($password);
        if ($email != null AND $password != null) {
            $result = User::where('email', $email)
                ->where('password', $password)
                ->first();
            if ($result) {
                $status = "success";
            } else {
                $message = "Email or Password did not match";
                $code = "404";
            }
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function forgetPassword(Request $request)
    {
        /*echo $this->encrypt("13")."<br>";
        echo $this->decrypt($this->encrypt("13"));*/

        /* $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $password = substr(str_shuffle(str_repeat($pool, 5)), 0, 8);*/

        $message = "";
        $code = "0";
        $status = "failed";
        $result = null;
        $email = $request['email'];
        $result = User::where('email', $email)
            ->first();
        if (is_null($result)) {
            $message = "Email or Password did not match";
            $code = "404";
        } else {
            //User::where('email', $email)->update(['password' => md5($password)]);
            $id = $this->encrypt($result->id);
            $url = "http://talkingstatues.app/user/password-reset/" . $id;

            $to = $result->email;
            $subject = "Talking Statue- Forget Password";
            $txt = "Click here to reset your password: " . $url;
            $headers = "From: info@talkingstatue.app" . "\r\n" .
                "CC: memotiur@gmail.com";
            mail($to, $subject, $txt, $headers);
            $status = "success";
            $message = "Check your email.";
        }

        //return $url;
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function GetCities(Request $request)
    {
        $city_id = $request['city_id'];
        $message = "";
        $code = "0";
        $status = "failed";
        $result = null;

        try {
            if ($city_id == -1 OR $city_id == null) {
                $result = DB::table('cities')
                    ->get();
            } else {
                $result = DB::table('cities')
                    ->where('cities.city_id', $city_id)
                    ->get();
            }

            $code = "0";
            $status = "success";
            if (is_null($result)) {
                $status = "failed";
                $code = "204";
                $message = "City Not Found";
            }

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
        }

        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }


    public function GetStatues(Request $request)
    {
        $city_id = $request['city_id'];
        $user_id = $request['user_id'];
        $message = "";
        $code = "0";
        $status = "failed";
        $result = null;

        try {
            if ($city_id == -1 OR $city_id == null) {
                $all_statues = DB::table('statues')
                    ->join('cities', 'statues.city', '=', 'cities.city_id')
                    ->get();
            } else {
                $all_statues = DB::table('statues')
                    ->join('cities', 'statues.city', '=', 'cities.city_id')
                    ->where('cities.city_id', $city_id)
                    ->get();
            }

            $code = "0";
            $status = "success";
            if (is_null($all_statues)) {
                $status = "failed";
                $code = "204";
                $message = "Statue Not Found";
            }

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
        }

        $visited_statues = $this->GetVisitedStatue($user_id);

        $updated_array = array();
        foreach ($all_statues as $res) {

            //return $res->template_id;
            $template_array = Template::where('template_id', $res->template_id)->first();

            $is_visited = false;
            foreach ($visited_statues as $visited) {
                if ($visited->statue_id == $res->statue_id) {
                    $is_visited = true;
                }
            }
            $res->is_visited = $is_visited;
            $res->template = $template_array;;
            array_push($updated_array, $res);


            ///array_push($updated_array, $template_array);
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $updated_array,
        ];
        return $data;
    }

    public function GetStatueInfo(Request $request)
    {

        $message = "";
        $code = "0";
        $status = "failed";
        $result = null;
        $statue_id = $request['statue_id'];
        if ($statue_id) {
            try {
                $result = DB::table('statues')
                    ->join('cities', 'statues.city', '=', 'cities.city_id')
                    ->where('statues.statue_id', $statue_id)
                    ->first();
                $code = "0";
                $status = "success";
                if (is_null($result)) {
                    $status = "failed";
                    $code = "204";
                    $message = "Statue Not Found";
                }

            } catch (\Exception $exception) {
                $message = $exception->getMessage();
                $code = 404;
                $status = "failed";
            }
        } else {
            $message = "Parameter did not match";
        }

        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function GetPlaces(Request $request)
    {
        $message = "";
        $status = "";
        $code = "0";
        $city_id = $request['city_id'];
        if ($city_id == -1 OR $city_id == null) {
            $result = Place::get();
        } else {
            $result = Place::where('city_id', $city_id)->get();

        }
        if (sizeof($result) <= 0) {
            $message = "Place Not Found !";
            $status = "failed";
            $code = "404";
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function GetPlaceInfo(Request $request)
    {
        $message = "";
        $code = "0";
        $status = "failed";
        $result = null;
        $place_id = $request['place_id'];
        if ($place_id) {
            try {

                $result = DB::table('places')
                    ->join('cities', 'places.city_id', '=', 'cities.city_id')
                    ->where('places.place_id', $place_id)
                    ->first();
                $code = "0";
                $status = "success";
                if (is_null($result)) {
                    $status = "success";
                    $code = "0";
                }

            } catch (\Exception $exception) {
                $message = $exception->getMessage();
                $code = 404;
                $status = "failed";
            }
        }

        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function VisitStatue(Request $request)
    {
        //return $request;
        $user_id = $request['user_id'];
        $statue_id = $request['statue_id'];
        try {
            if (ActivityLog::where('user_id', $user_id)->where('statue_id', $statue_id)->count() > 0) {
                $message = "Already Inserted";
            } else {
                $message = "Successfully Inserted";
            }
            ActivityLog::create(array('user_id' => $user_id, 'statue_id' => $statue_id));
            $code = "0";
            $status = "success";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => "",
        ];
        return $data;
    }

    public function GetSponsorLogos(Request $request)
    {
        try {
            $result = SponsorLogo::get();
            $code = "0";
            $status = "success";
            $message = "";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function GetRewards(Request $request)
    {
        $city_id = $request['city_id'];

        try {
            if ($city_id != null) {
                $result = DB::table('rewards')->where('reward_city', $city_id)->get();
            } else {
                $result = DB::table('rewards')->get();
            }

            $code = "0";
            $status = "success";
            $message = "";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
            $result = "";
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function GetTemplates(Request $request)
    {
        $template_id = $request['template_id'];
        try {
            $result = DB::table('templates')->where('template_id', $template_id)->get();
            $code = "0";
            $status = "success";
            $message = "";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
            $result = "";
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function GetAllSlides(Request $request)
    {
        try {
            //$result = DB::table('top_slide_images')->where('template_id', $template_id)->get();
            $result = DB::table('top_slide_images')->get();
            $code = "0";
            $status = "success";
            $message = "";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
            $result = "";
        }

        $updated_array = array();
        foreach ($result as $res) {

            //return $res->template_id;
            $template_array = Template::where('template_id', $res->template_id)->first();
            $res->template = $template_array;

            array_push($updated_array, $res);


            ///array_push($updated_array, $template_array);
        }

        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function GetAllTemplates(Request $request)
    {
        //$template_id = $request['template_id'];
        try {
            $result = DB::table('templates')->get();
            $code = "0";
            $status = "success";
            $message = "";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
            $result = "";
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function GetAboutUs(Request $request)
    {
        try {
            $result = DB::table('abouts')->get();
            $code = "0";
            $status = "success";
            $message = "";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
            $result = "";
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    public function GetFAQS(Request $request)
    {
        try {
            $result = DB::table('faqs')->get();
            $code = "0";
            $status = "success";
            $message = "";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
            $result = "";
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $result,
        ];
        return $data;
    }

    /* public function GetAwards(Request $request)
     {
         $message = "";
         $user_id = $request['user_id'];
         $city_id = $request['city_id'];
         try {
             $result = DB::table('activity_logs')
                 ->join('statues', 'statues.statue_id', '=', 'activity_logs.statue_id')
                 ->where('activity_logs.user_id', $user_id)
                 ->where('statues.city', $city_id)
                 ->get();
             $code = "0";
             $status = "success";
         } catch (\Exception $exception) {
             $message = $exception->getMessage();
             $code = 404;
             $status = "failed";
             $result = "";
         }
         $data = [
             'status' => $status,
             'code' => $code,
             'message' => $message,
             'json' => $result,
         ];
         return $data;

     }*/

    /*  public function RedeemAward(Request $request)
      {
          //return $request;
          $user_id = $request['user_id'];
          $city_id = $request['city_id'];
          $serial_number =$this->randomString();
          $rewards = Reward::where('reward_city', $city_id)->first();
          try {
              if (RedeemAward::where('user_id', $user_id)->where('city_id', $city_id)->count() > 0) {
                  $message = "Already Inserted";
                  $status = "success";
              } else {
                  $status = "success";
                  $message = "Successfully Inserted";
                  RedeemAward::create(
                      array(
                      'user_id' => $user_id,
                      'city_id' => $city_id,
                      'reward_id' => $rewards->reward_id,
                      'serial_number' => $serial_number,
                      'redeem_date' => date('Y-m-d h:i:s'))
                  );
              }
              $code = "0";

          } catch (\Exception $exception) {
              $message = $exception->getMessage();
              $code = 404;
              $status = "failed";
          }
          $rewards->user_id = $user_id;
          $rewards->serial_number = $serial_number;
          $data = [
              'status' => $status,
              'code' => $code,
              'message' => $message,
              'json' => $rewards,
          ];
          return $data;
      } */

    public function RedeemAward(Request $request)
    {
        //return $request;
        $user_id = $request['user_id'];
        $city_id = $request['city_id'];
        $serial_number = $this->randomString();
        $rewards = Reward::where('reward_city', $city_id)->first();
        try {
            $this->removeActivityData($user_id, $city_id);
            if (RedeemAward::where('user_id', $user_id)->where('city_id', $city_id)->count() > 0) {
                $message = "Already Inserted";
                $status = "success";
            } else {
                $status = "success";
                $message = "Successfully Inserted";
                RedeemAward::create(
                    array(
                        'user_id' => $user_id,
                        'city_id' => $city_id,
                        'reward_id' => $rewards->reward_id,
                        'serial_number' => $serial_number,
                        'redeem_date' => date('Y-m-d h:i:s'))
                );
            }
            $code = "0";

        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
        }
        $rewards->user_id = $user_id;
        $rewards->serial_number = $serial_number;
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $rewards,
        ];
        return $data;
    }


    public function ScanStatues(Request $request)
    {
        $user_id = $request['user_id'];
        $qr_code = $request['qr_code'];

        $message = "";
        $code = "0";
        $status = "failed";
        $result = null;
        $statue_exist = null;
        if ($user_id) {
            $result = Statue::where('qr_code', $qr_code)->first();
            $code = "0";
            $status = "success";
            if (is_null($result)) {
                $status = "failed";
                $code = "204";
                $message = "Scanned Statue is not Exist";
            } else {
                $statue_id = $result->statue_id;
                try {
                    $statue_exist = Activities::where('user_id', $user_id)->where('statue_id', $statue_id)->first();
                    if (is_null($statue_exist)) {
                        $current_time = date('Y-m-d H:i:s');
                        Activities::insert(array('user_id' => $user_id,
                            'statue_id' => $statue_id,
                            'created_at' => $current_time,
                            'updated_at' => $current_time
                        ));
                        $message = "Activity Inserted";
                    } else {
                        $status = "failed";
                        $code = "204";
                        $message = "Activity Already Exist";
                    }

                } catch (\Exception $exception) {
                    $message = $exception->getMessage();
                    $code = 404;
                    $status = "failed";
                }
            }
        }

        //$all_statue = Activities::where('user_id', $user_id)->where('statue_id', $statue_id)->get();

        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $statue_exist,
        ];
        return $data;

    }


    public function GetVisitedStatue($user_id)
    {
        try {
            $result = DB::table('activity_logs')
                ->where('user_id', $user_id)
                ->get();
            $code = "0";
            $status = "success";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
            $result = "";
        }
        return $result;
    }


    public function SetSelfie(Request $request)
    {
        $user_id = $request['user_id'];
        $statue_id = $request['statue_id'];
        //$image_url = $request['image'];

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = "";
        }


        try {
            $array = array('user_id' => $user_id, 'statue_id' => $statue_id, 'image_url' => $image_name);
            Selfies::insert($array);
            $code = "0";
            $status = "success";
            $message = "Inserted Succesfully";
        } catch (\Exception $exception) {
            $message = $exception->getMessage();
            $code = 404;
            $status = "failed";
            $result = "";
        }
        $data = [
            'status' => $status,
            'code' => $code,
            'message' => $message,
            'json' => $array,
        ];
        return $data;
    }


    function encrypt($input)
    {
        return strtr(base64_encode($input), '+/=', '._-');
    }

    function randomString()
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, 8);
    }

    private function removeActivityData($user_id, $city_id)
    {
        $activities = ActivityLog::where('user_id', $user_id)->get();
        $statues = Statue::where('city', $city_id)->get();
        foreach ($activities as $activity) {
            foreach ($statues as $statue) {
                if ($activity->statue_id == $statue->statue_id) {
                    ActivityLog::where('activity_id', $activity->activity_id)->delete();
                    // echo "matched<br>";
                }
            }
        }
        //echo "Calling Remove Method<br>";
    }


}

