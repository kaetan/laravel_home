<?php


namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ParsingController extends Controller
{
    public function index()
    {
        return view('parsing');
    }

    public function parse(Request $request)
    {
        $params = $request->all();
        $url = $params['wikiLink'] ?? null;
        $result = [];

        if ($url) {
            $client = new Client();
            $response = $client->request('GET', $url);
            $data = $response->getBody()->getContents();
            preg_match('/data-wikidata-property-id=\"P569\".+title="(\d{1,2}\s[а-я]{4,8})">.+title="(\d{1,4})/imu', $data, $matches);
            $result['birthday'] = $matches[1] . ' ' . $matches[2];
        }
        return view('parsing')->with('result', $result);
    }
}
