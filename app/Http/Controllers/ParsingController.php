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

        if ($url) {
            $client = new Client();
//            $response = $client->get($url);
            $response = $client->request('GET', $url);
//            dd($response);
            $data = (string) $response->getBody()->getContents();
//            $matches = [];
//            preg_match()
            dd($data);
        }
        dd('nope');
    }
}
