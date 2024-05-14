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
<html lang="ru">
  <head>
    <meta charset='utf-8' />
    <!--<meta name='viewport' content='width=device-width, initial-scale=1' /> -->
    <title>Курс по компьютерной сборке</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="styles/login.css">
  </head>
  <body>
<div class='text1'>Первый курс <br />по компьютерной сборке <?php echo $user['rank']; ?></div>
</body>
</html>