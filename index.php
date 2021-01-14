<?php
include "includes/simple_html_dom.php";
require_once "config/DbConnect.php"
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Lấy dữ liệu từ trang web XXX</h1>
    <form action="crawlData.php">
        <div class="form-group">
            <label for="page-url" class="label-input">Email address</label>
            <input type="text" class="form-control" id="page-url" aria-describedby="url" placeholder="please enter page url">
        </div>
        <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
        <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-submit">getData</button>
        </div>


    </form>
</div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>
