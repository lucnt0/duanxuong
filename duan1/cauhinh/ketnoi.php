<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'duan1';

// Tạo kết nối MySQLi
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Kiểm tra kết nối
if ($conn->connect_error) {
   die("Kết nối thất bại: " . $conn->connect_error);
}

// Đặt bảng mã kết nối
$conn->set_charset("utf8");
?>
