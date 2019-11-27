<?php

namespace App\Crawler\Algorithms;

use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlObserver;
use DOMDocument;

class CrawlObserverChild extends CrawlObserver{

    private $pages =[];


    public function crawled(
        UriInterface $url,
        ResponseInterface $response,
        ?UriInterface $foundOnUrl = null
    )
    {

        $path = $url->getPath();
        $doc = new DOMDocument();
        @$doc->loadHTML($response->getBody());

        if (!empty($doc->getElementsByTagName("title")[0]->nodeValue))
           $title = $doc->getElementsByTagName("title")[0]->nodeValue;
        else 
           $title = 'empty';

        $this->pages[] = [
            'path'=>$path,
            'title'=> $title
        ];
    }

    public function crawlFailed(
        UriInterface $url,
        RequestException $requestException,
        ?UriInterface $foundOnUrl = null
    )
    {
        echo sprintf("\nfailed maybe you entered a wrong website link format\n");
    }

    public function finishedCrawling()
    {

        $myJSON = json_encode($this->pages);

        // **** save the json object to a json file ******
        $file = fopen('crawler json result.json','w+');
        fwrite($file, $myJSON);
        fclose($file);
       
        // ****** Display all the crawled paths with pages title on the command line ****
        foreach ($this->pages as $page){
           // echo sprintf("Url  path: %s Page title: %s%s", $page['path'], $page['title'], PHP_EOL);
           echo sprintf("***************************************************************");
           echo sprintf("\nUrl  path: %s%s", $page['path'], PHP_EOL);
           echo sprintf("Page title: %s%s",$page['title'], PHP_EOL);
        
        }

        echo sprintf("\ncrawled " . count($this->pages) . ' urls' . PHP_EOL."\n");
        echo sprintf("created by ELAMINE BACHIR \n");

    }

}  
  


?>