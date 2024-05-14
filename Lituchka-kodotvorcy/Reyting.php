<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="Reyting.css">
    <title>Profile</title>
    
</head>
<body>
    <h1 class="glav-text">Рейтинг группы </h1>
    <div class="Scrol-Block">

    <?php
// Подключение к базе данных
include("db_connect.php");

// Получаем идентификатор пользователя из сессии
$user_id = $_SESSION['id'];

// Выполняем запрос к базе данных для получения значения поля std_group
$query = "SELECT std_group FROM users WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $std_group = $user['std_group'];

    // Выполняем запрос к базе данных для получения рейтинга всех пользователей из той же группы, с сортировкой по убыванию
    $query = "SELECT username, rating FROM users WHERE std_group = ? ORDER BY rating DESC";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $std_group);
    $stmt->execute();
    $result = $stmt->get_result();

    // Выводим рейтинг студентов
    while ($user = $result->fetch_assoc()) {
        echo "<div class='block'>
                    <a class='text'>" . $user['username'] . "</a>
                    <a class='text2'>". $user['rating'] . "</a>
                    <img src='img/star.svg' alt=''>
                  </div>";
    }
}
$stmt->close();
$db->close();
?>
    </div>
</body>
</html>