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
            $data = $response->getBody()->getContents();
//            file_put_contents('testPregFile', $data);
//            $fileContent = file_get_contents('testPregFile');
//            $matches = [];
            $pregTest = preg_match('/data-wikidata-property-id=\"P569\".+title="(\d{1,2}\s[а-я]{4,8})">.+title="(\d{1,4})/', $data, $matches);
//            dump($pregTest);
//            dump($data);
            dd($matches);
        }
        dd('nope');
    }
}
/**
 * сентября
 * октября
 * января
 * февраля
 * марта
 * апреля
 * июня
 * июля
 * августа
 * сентября
 * октября
 * ноября
 * декабря
*/
