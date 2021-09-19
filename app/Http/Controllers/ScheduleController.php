<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $Url = 'http://hacettepeaso.hacettepe.edu.tr/genel/haftalik-ders-programlari-icerik-130';
        $UserAgent = 'Mozilla/5.0 (compatible; Googlebot/2.1; +[url]http://www.google.com/bot.html)';
        $Referer = 'http://www.google.com/';
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $Url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_REFERER, $Referer);
        curl_setopt ($ch, CURLOPT_USERAGENT, $UserAgent);
        $return = curl_exec($ch);
        curl_close($ch);
        
        $dom = new \DOMDocument();
        @$dom->loadHTML($return); // We use @ here to suppress a bunch of parsing errors that we shouldn't need to care about too much.
        $array =[];
        $xpath = new \DomXpath($dom);
       
        for ($i=0; $i <4 ; $i++) { 
            $title  = $xpath->query('//*[@class="col-lg-8 col-md-12"]/p')->item($i);
            $url  = $xpath->query('//*[@class="col-lg-8 col-md-12"]/p/a')->item($i);

            array_push($array,[
                'title'=>strval($title->nodeValue),
                'url'=>'http://hacettepeaso.hacettepe.edu.tr/'.$url->getAttribute('href')
            ]);
        }
        return $array;
    }
}
