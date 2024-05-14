<?php 
	 session_start();
	 if (empty($_SESSION['id']))
    {
      header('Location: https://online-flyer.ru/login.php');
    } 
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="Result-prepod.css" />
    <title>Profile</title>
  </head>
  <body>
    <h1 class="glav-text">Группы</h1>
    <div class="Scrol-Block">
    <?php
// Подключение к базе данных
include("db_connect.php");

// Получаем идентификатор пользователя из сессии
$user_id = $_SESSION['id'];

// Выполняем запрос к базе данных для получения всех уникальных групп без повторений
$sql = "SELECT DISTINCT std_group FROM users WHERE std_group <> ''";
$result = $db->query($sql);

// Вывод данных на страницу
if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {

    echo"<div class='block'>
        <a class='text'>$row[std_group]</a>
        <div class='button-start'>
          <a href='Result-prepod-group.php'>Смотреть</a>
        </div>";
      }}

      $db->close();
            ?>
      </div>
    </div>
  </body>
</html>
