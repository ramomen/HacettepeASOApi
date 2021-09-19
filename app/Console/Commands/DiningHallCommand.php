<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DiningHallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hall:test';

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
        $Url = 'http://www.sksdb.hacettepe.edu.tr/bidbnew/grid.php?parameters=qbapuL6kmaScnHaup8DEm1B8maqturW8haidnI%2Bsq8F%2FgY1fiZWdnKShq8bTlaOZXq%2BmwWjLzJyPlpmcpbm1kNORopmYXI22tLzHXKmVnZykwafFhImVnZWipbq0f8qRnJ%2BioF6go7%2FOoplWqKSltLa805yVj5agnsGmkNORopmYXam2qbi%2Bo5mqlXRrinJdf1BQUFBXWXVMc39QUA%3D%3D';
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
        $content = [];
        
        $xpath = new \DomXpath($dom);
        
        $item_length = $xpath->query('//*[@class="popular"]')->length;
        for ($i=0; $i <$item_length ; $i++) { 
            $date  = $xpath->query('//*[@class="popular"]')->item($i);
            $foods  = $dom->saveHTML($xpath->query('//*[@class="pricing"]/p')->item($i));

            $remove_slash_n = str_replace("\n","",$foods);
            $remove_blank = str_replace("                                 ","",$remove_slash_n);
            $remove_p = str_replace("<p>","",$remove_blank);
            $remove_p_slash = str_replace("</p>","",$remove_p);
            $remove_strong = str_replace("<strong>","",$remove_p_slash);
            $remove_strong_slash = str_replace("</strong>","",$remove_strong);
            $add_slash_n = str_replace("<br>","\n",$remove_strong_slash);

            array_push($content,[ 
                'date'=>strval($date->nodeValue),
                'url'=> $add_slash_n
            ]);
        }
        $array =[
            'Content' => $content,
            'Count' => $item_length,
            'Source' =>'http://www.sksdb.hacettepe.edu.tr/bidbnew/grid.php?parameters=qbapuL6kmaScnHaup8DEm1B8maqturW8haidnI%2Bsq8F%2FgY1fiZWdnKShq8bTlaOZXq%2BmwWjLzJyPlpmcpbm1kNORopmYXI22tLzHXKmVnZykwafFhImVnZWipbq0f8qRnJ%2BioF6go7%2FOoplWqKSltLa805yVj5agnsGmkNORopmYXam2qbi%2Bo5mqlXRrinJdf1BQUFBXWXVMc39QUA%3D%3D'
        ];
        dd($array);
    }
}
