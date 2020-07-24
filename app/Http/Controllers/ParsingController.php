<?php


namespace App\Http\Controllers;

use App\Recipe;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ParsingController extends Controller
{
    private $client;

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
        $categories = $this->getCategories();
        $dishes = $this->getDishes($categories);

        foreach ($dishes as $dish) {
            $row = new Recipe();
            $row->category = $dish['category'];
            $row->title = $dish['title'];
            $row->description = $dish['description'];
            $row->picture_url = $dish['picture'];
            $row->save();
        }

        dump('Okay');
        dd($dishes);
    }

    private function getCategories()
    {
        // Получаем начальную дату с точки входа
        $url = 'https://www.povarenok.ru/recipes/dishes/first/';
        $this->client = new Client();
        $response = $this->client->request('GET', $url);
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

        return $categories;
    }

    private function getDishes($categories)
    {
        sleep(rand(2, 3));
        $dishes = [];

        $count = 0;
        foreach ($categories as $category) {
            $categoryUrl = $category['link'];
            $categoryResponse = $this->client->request('GET', $categoryUrl);
            $categoryData = $categoryResponse->getBody()->getContents();

            $categoryDataTrimmed = str_replace(array("\r", "\n"), '', $categoryData);
            $categoryConvertedData= mb_convert_encoding($categoryDataTrimmed, "utf-8", "windows-1251");

            preg_match_all('/<article class="item-bl">.+src="(.+)".+<h2>.+">(.+)<\/a>.+<\/h2>.+article-breadcrumbs.+<\/div>.+<p>(.+)<\/p.+<\/article/Uumi', $categoryConvertedData, $categoryMatches);

            $dishPictures = $categoryMatches[1];
            $dishTitles = $categoryMatches[2];
            $dishDescriptions = $categoryMatches[3];

            foreach ($dishTitles as $key => $dishTitle) {
                $dishes[] = [
                    'category' =>  $category['title'],
                    'title' => $dishTitle,
                    'description' => $dishDescriptions[$key],
                    'picture' => $dishPictures[$key],
                ];
            }

            sleep(1);

            $count++;

            if ($count > 2) {
                break;
            }
        }

        return $dishes;
    }

    private function getProxies()
    {

    }
}