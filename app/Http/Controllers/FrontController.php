<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FrontController extends Controller
{
    // index
    public function index()
    {
        return view('fronts.index');
    }
    public function detail($id)
    {
        return view('fronts.detail');
    }
}
