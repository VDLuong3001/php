<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'demoshop';
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Thiết lập charset để tránh lỗi tiếng Việt
$conn->set_charset('utf8');
?>
