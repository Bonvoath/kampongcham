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

    public function service_price($id)
    {
        $data = array('id' => $id);

        return view('fronts.service_price', $data);
    }

    public function getService(){
        $client = new Client();
        $res = $client->get($this->apiUrl('service/type/get'));

        return $res->getBody();
    }

    public function getServicePrice($id)
    {
        $client = new Client();
        $res = $client->post($this->apiUrl('service/price/get'), [
            'json' => ['ParentId' => $id]
        ]);

        echo $res->getBody();
    }
}