<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class ApiV1Controller extends Controller
{
    public function api_get_all_post(){
        $data['posts'] = DB::table('posts')
                        ->orderBy('id', 'desc')
                        ->where('post_type', 'post')
                        ->where('active', 1)
                        ->paginate(25);
                        
        return Response::json($data);
    }
}