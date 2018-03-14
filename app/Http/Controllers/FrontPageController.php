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

    public function service_price()
    {
        return view('fronts.service_price');
    }

    public function getService(){
        $client = new Client();
        $res = $client->get($this->apiUrl('service/type/get'));

        return $res->getBody();
    }

    public function getServicePrice()
    {
        $client = new Client();
        $res = $client->get($this->apiUrl('service/price/get'));

        return $res->getBody();
    }
}