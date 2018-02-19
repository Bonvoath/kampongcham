<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FrontPageController extends Controller
{
    // index
    public function about()
    {
        $data['about'] = DB::table('pages')
            ->where('id', 1)
            ->first();
        return view('fronts.pages.about', $data);
    }
    public function contact()
    {
        $data['contact'] = DB::table('pages')
            ->where('id', 2)
            ->first();
        return view('fronts.pages.contact', $data);
    }
    public function message($id)
    {
        $data['message'] = DB::table('governor_histories')
            ->where('id', 3)
            ->first();
        return view('fronts.pages.message', $data);
    }
}
