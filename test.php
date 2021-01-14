<?php
use GuzzleHttp\Client;
use Symfony\Component\HttpClient\HttpClient;


include_once "includes/simple_html_dom.php";
require_once "vendor/autoload.php";
require_once "includes/function.php";

//
//$baseUrl = "https://vlxx.xyz";
//$html = file_get_html($baseUrl);
//$videos =$html->find(".video-list");
$video_url = "https://vlxx.xyz/video/co-hang-xom-thich-mac-do-xuyen-thau-va-cau-sinh-vien-may-man/1697/";
$id = getIdFromUrl("$video_url");
//$video_id = getIdFromUrl($video_url);
$rawUrl = getRawUrlFromId($id);
$player_url = extractUrl($rawUrl);
echo "video id: ".$id."<br>";
echo "Player url: ".$player_url."<br>";
//echo $player_url;
echo '  <a href="'.$player_url. ' ">Phim xxx </a>';
