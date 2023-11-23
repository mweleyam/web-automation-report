<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        //get report data
        $client = new Client();
        $response = $client->get("http://127.0.0.1:8000/api/automations");
        $data = json_decode($response->getBody(), true);
        $data = $data["data"]["data"];


        //get chart data
        $client = new Client();
        $response = $client->get("http://127.0.0.1:8000/api/charts/total_schenario");
        $chart = json_decode($response->getBody(), true);

        $chart_service = [];
        $chart_total_scenario = [];
        foreach ($chart["data"] as $c) {
            array_push($chart_service, $c["service"]);
            array_push($chart_total_scenario, $c["total_scenario"]);
        }

        return view("admin/home", compact('data', 'chart_service', 'chart_total_scenario'));
    }

}
