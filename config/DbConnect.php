<?php
//khai báo biến host
$hostName = 'localhost';
// khai báo biến username
$userName = 'root';
//khai báo biến password
$passWord = '';
// khai báo biến databaseName
$databaseName = 'vlxx';
// khởi tạo kết nối
$connection = mysqli_connect($hostName, $userName, $passWord, $databaseName);
//Kiểm tra kết nối
if (!$connection) {
    exit('Kết nối không thành công!');
}
// thành công
//echo 'Kết nối thành công!';
