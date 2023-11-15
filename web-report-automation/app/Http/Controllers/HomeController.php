<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $client = new Client();
        $response = $client->get("http://127.0.0.1:8000/api/automations");
        $data = json_decode($response->getBody(), true);
        $data = $data["data"]["data"];
        // var_dump($data);

        return view("admin/home", compact('data'));
    }
}
