<?php

use Includes\myFunction\htmlUtility;
use GuzzleHttp\Client;
use Symfony\Component\HttpClient\HttpClient;


include_once "includes/simple_html_dom.php";
require_once "vendor/autoload.php";
require_once "includes/function.php";
require_once "config/DbConnect.php";


$baseUrl = "https://vlxx.xyz/";
for ($i = 53; $i < 55; $i++) {
    $utility = new htmlUtility();
//    if($i%5 ==0) sleep(5);
//    sleep(1);

    $url = $baseUrl . 'new/' . $i;
    echo "$url" . "<br>";

try{

    $html = file_get_html($url);
//    sleep(5);
    $flag= true;
    do{

        try{

            $videos = $html->find("li.video-list");
//            sleep(5);
            $flag = false;

        }catch (Exception $exception) {
            echo $exception->getMessage();
            continue;
        }

    } while($flag);

    foreach ($videos as $video) {
//        sleep(1);
        $htm = $video->first_child();
        $video_url = $baseUrl . $htm->href;
        $video_name = $htm->title;

        $imgTag = $htm->first_child();
        $img_url = $imgTag->attr['data-cfsrc'];
//    var_dump($imgTag) ;
//    $img_url = $imgTag
        echo "title : " . $video_name . "<br>";
        echo "image url: " . $img_url . "<br>";
        echo "video url: " . $video_url . "<br>";

        $video_id = $utility->getIdFromUrl($video_url);
        $rawUrl = $utility->getRawUrlFromId($video_id);

        $player_url = $utility->extractUrl($rawUrl);
        echo "video id: " . $video_id . "<br>";
        echo "Player url: " . $player_url . "<br>";

        $sql = "INSERT INTO VIDEO ( name , origin_id , video_url , player_url , image_url ) values" .
            "('$video_name', '$video_id' ,'$video_url' , '$player_url' , '$img_url' )";
        if (mysqli_query($connection, $sql)) {
            echo "add $video_name successfully";
        }
    }

} catch (Exception $e) {
    echo $e->getMessage();
    continue;

}


    $html->clear();
    unset($html);

}


