<?php
namespace Includes\myFunction;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Component\HttpClient\RetryableHttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class htmlUtility {
    private $client;
    public function __construct()
    {
//       $this->client = HttpClient::create([
//           'max_redirects' => 1000,
//       ] ,100 , 100);
       $this->client= new RetryableHttpClient(HttpClient::create());

//        $this->client=   new NativeHttpClient();
//        $client = new CurlHttpClient();
//        $this->client = HttpClient::create(['http_version' => '1.1'] , 10000 , 100000);

    }

   public function extractUrl(string $url): string
    {
        $str1 = "https:";
        $str2 = '==';
        $pos1 = strpos($url, $str1, 0);
        $pos2 = strpos($url, $str2, 0);
//    echo $pos2."<br>";
        $len = $pos2 - $pos1;
//   return substr($url , $pos1 , $len);
        str_replace("\\\\", "", substr($url, $pos1, $len));
        return str_replace("\\", "", substr($url, $pos1, $len)) . "==";
    }

   public function getRawUrlFromId(string $id): string
    {

        try {
            $response = $this->client->request('POST', 'https://vlxx.xyz/ajax.php', [
                'body' => "vlxx_server=1&id=" . $id . "&server=1" ,'timeout'=> 10
            ]);
        } catch (TransportExceptionInterface $e) {
        }
//        return htmlentities($response->getContent());
        try {

            return strval($response->getContent());
        } catch (\Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface | \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface | \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface | \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface $e) {
            return $e;
        }

    }

   public function getIdFromUrl(string $url): string
    {

        $arr = explode("/" ,$url);
        $len = count($arr);

        return $arr[$len-2];

    }



}
