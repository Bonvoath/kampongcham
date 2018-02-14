<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // count number of category
        $count_category = DB::table('categories')->where('active',"=", 1)->count();
        // couont number of shop
        $count_shop = DB::table('shops')->where('active',"=", 1)->count();
        // count number of product
        $count_product = DB::table('products')->where('active',"=", 1)->count();
        // count number of package
        $count_package = DB::table('packages')->where('active',"=", 1)->count();
        // count number of subscription
        $count_subscirption = DB::table('subscriptions')->where('active',"=", 1)->count();
        

        $data['category']= $count_category;
        $data['shop']= $count_shop;
        $data['product']= $count_product;
        $data['package']= $count_package;
        $data['subscription']= $count_subscirption;

        return view('home')->with('dd_count', $data);;
    }

}
