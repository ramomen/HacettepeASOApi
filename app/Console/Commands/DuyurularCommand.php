<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DuyurularCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:duyuru';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $Url = 'http://hacettepeaso.hacettepe.edu.tr/yeni-duyuru-kategorisi-110';
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

        dd($array);
       
    }
}
