<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
           app()->setLocale(Session::get("lang"));
            return $next($request);
        });
    }
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
        $data['category'] = DB::table('categories')
            ->where('id',$id)
            ->where('active',1)
            ->first();
        return view('fronts.page_by_categories', $data);
    }
}
