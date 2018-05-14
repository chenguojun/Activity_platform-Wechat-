<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class Controller extends CommonController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function Index(){
        var_dump("213");
    }
}
