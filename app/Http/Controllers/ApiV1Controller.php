<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Response;

class ApiV1Controller extends Controller
{
    public function api_get_all_post(){
        $page = 1;
        $limit = 25;
        $data['posts'] = DB::table('posts')
                        ->select('id','title','feature_image','create_at')
                        ->orderBy('id', 'desc')
                        ->where('post_type', 'post')
                        ->where('active', 1)
                        ->paginate($limit);

        foreach($data['posts'] as $ret)
        {
            unset($ret->description);
            $ret->feature_image = url('/uploads/posts/250x250/'.$ret->feature_image);
        }

        return Response::json($data);
    }
}