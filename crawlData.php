<?php


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

include_once "includes/simple_html_dom.php";
require_once "vendor/autoload.php";

//$html = file_get_html('http://viet69.co/choi-em-buom-non-hong-hao-cuc-ngon/');
//echo $html;
$client = HttpClient::create();
$response = $client->request('POST', 'https://vlxx.xyz/ajax.php' , [
    'body' => "vlxx_server=1&id=676&server=1"
]);

echo extractUrl (htmlentities( $response->getContent()));

function extractUrl($url) {
    $str1 = "https:";
    $str2 = '==';
    $pos1 = strpos($url , $str1 , 1);
    $pos2 = strpos($url ,$str2 ,1);
//    echo $pos2."<br>";
    $len = $pos2 -$pos1;
//   return substr($url , $pos1 , $len);
    str_replace("\\\\" ,"" , substr($url , $pos1 , $len));
    return  str_replace("\\" ,"" , substr($url , $pos1 , $len))."==";
}
