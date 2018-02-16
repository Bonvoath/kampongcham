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
        $data['detail'] = DB::table('posts')->where('id', $id)->first();

        return view('fronts.detail', $data);
    }
    public function about_kampongcham_detail($id)
    {
        $data['detail'] = DB::table('about_kampongchams')->where('id', $id)->first();

        return view('fronts.about_kampongcham', $data);
    }
    public function page_by_category($id)
    {
        $data['posts'] = DB::table('posts')
            ->where('category_id', $id)
            ->where('active',1)
            ->paginate(10);
        return view('fronts.page_by_categories', $data);
    }
}
