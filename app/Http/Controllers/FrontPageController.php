<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use GuzzleHttp\Client;

class FrontPageController extends Controller
{
    public function service()
    {
        return view('fronts.service');
    }

    public function getService(){
        $client = new Client();
        $res = $client->get('http://203.223.44.122/owso/api/v1/service/type/get');
        return $res->getBody();
    }
}