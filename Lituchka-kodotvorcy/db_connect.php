<?php
$servername = "127.127.126.26";
$username = "root";
$passwordd = "";
$dbname = "site";

// Создание подключения
$db = new mysqli($servername, $username, $passwordd, $dbname);

// Проверка соединения
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//echo "Connected successfully";

