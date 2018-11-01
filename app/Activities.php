<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    public $timestamps = true;
    protected $guarded = [];
    protected $table = "activity";
}
