<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="letuchke.css">
    <title>Profile</title>
</head>
<body>
    <h1 class="glav-text">Нужно пройти летучки</h1>
    <div class="Scrol-Block">
    <?php
// Подключение к базе данных
include("db_connect.php");

// Получаем идентификатор пользователя из сессии
$user_id = $_SESSION['id'];

// Выполняем запрос к базе данных для получения значения поля std_group  (НЕ ТРОГАЙ)
$query = "SELECT std_group FROM users WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $std_group = $user['std_group'];

    // Выполняем запрос к базе данных для получения онлайн-работ для всех пользователей из той же группы
    $query_works = "SELECT * FROM flyers WHERE stud_group = ?";
    $stmt_works = $db->prepare($query_works);
    $stmt_works->bind_param("s", $std_group);
    $stmt_works->execute();
    $result_works = $stmt_works->get_result();

    // Выводим онлайн-работы
    while ($work = $result_works->fetch_assoc()) {
        echo "<div class='block'>
                <a class='text'>" . $work['subject_name'] . "</a>
                <div class='button-start'>Начать</div>
              </div>";
    }

    $stmt_works->close();
}
$stmt->close();
$db->close();
?>


    </div>
</body>
</html>
