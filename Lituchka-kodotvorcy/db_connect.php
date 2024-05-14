<?php
$servername = "localhost";
$username = "iluxa2qv_flyer";
$passwordd = "J030EbC&";
$dbname = "iluxa2qv_flyer";

// Создание подключения
$db = new mysqli($servername, $username, $passwordd, $dbname);

// Проверка соединения
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//echo "Connected successfully";

