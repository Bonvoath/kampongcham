<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        
    }

    protected $data = array(
        'is_error' => true
    );

    protected function apiUrl($action)
    {
        $api_url = "http://203.223.44.122/owso/api/v1/".$action;

        return $api_url;
    }
}