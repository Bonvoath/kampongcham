<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MobileController extends Controller
{
    public function detail($id)
    {
        $data['detail'] = DB::table('posts')->where('id', $id)->first();

        return view('mobiles.detail', $data);
    }
}
