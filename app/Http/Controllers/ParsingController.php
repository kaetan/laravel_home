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

    public function parseSoups()
    {
        // Получаем начальную дату с точки входа
        $url = 'https://www.povarenok.ru/recipes/dishes/first/';
        $client = new Client();
        $response = $client->request('GET', $url);
        $data = $response->getBody()->getContents();

        // Избавляемся от символов конца строки, чтобы не пришлось писать слишком негибкую регулярку
        $dataTrimmed = str_replace(array("\r", "\n"), '', $data);
        $convertedData= mb_convert_encoding($dataTrimmed, "utf-8", "windows-1251");

        // Получаем блок с категориями супов
        preg_match('/>Суп<\/a>.+(ul.+<\/ul)/Uumi', $convertedData, $matches);

        // Получаем элементы списка из блока супов
        preg_match_all('/<li>.+href="(.+)">(.+)<\/a.+<\/li>/Uumi', $matches[1], $finalMatches);

        // Массив ссылок на категории
        $links = $finalMatches[1];
        //Массив названий категорий
        $titles = $finalMatches[2];

        // Объединяем названия и ссылки, получаем готовый массив категорий
        $categories = [];
        foreach ($links as $key => $link) {
            $categories[] = [
                'title' => $titles[$key],
                'link' => $link,
            ];
        }

        dump($categories);

        // Получим рецепты для одной категории
        // Но сперва поспим немного
        sleep(rand(2, 6));

        $categoryUrl = $categories[0]['link'];
        $categoryResponse = $client->request('GET', $categoryUrl);
        $categoryData = $categoryResponse->getBody()->getContents();

        $categoryDataTrimmed = str_replace(array("\r", "\n"), '', $categoryData);
        $categoryConvertedData= mb_convert_encoding($categoryDataTrimmed, "utf-8", "windows-1251");

        preg_match_all('/<article class="item-bl">.+src="(.+)".+<h2>.+">(.+)<\/a>.+<\/h2>.+article-breadcrumbs.+<\/div>.+<p>(.+)<\/p.+<\/article/Uumi', $categoryConvertedData, $categoryMatches);

        $dishPictures = $categoryMatches[1];
        $dishTitles = $categoryMatches[2];
        $dishDescriptions = $categoryMatches[3];

        $dishes = [];
        foreach ($dishTitles as $key => $dishTitle) {
            $dishes[] = [
                'title' => $dishTitle,
                'description' => $dishDescriptions[$key],
                'picture' => $dishPictures[$key],
            ];
        }

        dd($dishes);
    }
}
