<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FrontPageController extends Controller
{
    public function service()
    {
        return view('fronts.service');
    }
}
