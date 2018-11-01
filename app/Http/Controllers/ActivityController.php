<?php

namespace App\Http\Controllers;

use App\Activities;
use http\Exception;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function saveActivity(Request $request)
    {

        return $request->all();
        try {
            Activities::create($request->all());
            return "success";
        } catch (\Exception $exception) {
            return "decline";
        }


    }
}
