<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DuyurularController extends Controller
{
        public function LastestItems()
        {
            $url = 'http://hacettepeaso.hacettepe.edu.tr/yeni-duyuru-kategorisi-110';
            $UserAgent = 'Mozilla/5.0 (compatible; Googlebot/2.1; +[url]http://www.google.com/bot.html)';
            $Referer = 'http://www.google.com/';
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
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
            
            $item_length = $xpath->query('//*[@class="blog-content"]/h4')->length;

            for ($i=0; $i <$item_length ; $i++) { 
                $title  = $xpath->query('//*[@class="blog-content"]/h4')->item($i);
                $url  = $xpath->query('//*[@class="blog-content"]/h4/a')->item($i);
                $date  = $xpath->query('//*[@class="date"]')->item($i);

                array_push($array,[
                    'title'=>strval($title->nodeValue),
                    'url'=>'http://hacettepeaso.hacettepe.edu.tr/'.$url->getAttribute('href'),
                    'date'=>strval($date->nodeValue)
                ]);
            }
            return($array);
        }

}
