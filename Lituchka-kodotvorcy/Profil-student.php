<?php
session_start();
// Подключение к базе данных
include("db_connect.php");

// Получаем идентификатор пользователя из сессии
$user_id = $_SESSION['id'];

// Выполняем запрос к базе данных для получения значения поля rank
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

//Выводим значение поля rank
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    /*echo 'Значение поля rank для пользователя текущей сессии: ' . $user['rank'];
} else {
    echo 'Пользователь не найден или поля не заполнены.';*/
}

$stmt->close();
$db->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="Profil-student.css">
    <title>Profile</title>
    
</head>
<body>
    <div class="profile">
        <div class="circle-container">
          <div class="circle"></div>
        </div>
        <div class="user-info">
          <h1>Имя <?php echo $user['username']; ?></h1>
          <p>Звание: <?php echo $user['rank']; ?></p>
          <p>Группа: <?php echo $user['std_group']; ?></p>
          <p>Рейтинг: <?php echo $user['rating']; ?></p>
        </div>
      </div>
</body>
</html>