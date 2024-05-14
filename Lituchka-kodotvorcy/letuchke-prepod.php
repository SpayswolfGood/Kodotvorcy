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
    <link rel="stylesheet" href="letuchke-prepod.css" />
    <title>Profile</title>
  </head>
  <body>
    <h1 class="glav-text">Выберите какую летучку хотите начать</h1>
    <div class="Scrol-Block">

    <?php
// Подключение к базе данных
include("db_connect.php");



// Получаем идентификатор пользователя из сессии
$user_id = $_SESSION['id'];

// Выполняем запрос к базе данных для получения онлайн-работ для всех пользователей из той же группы
// Выполнение запроса к базе данных
$sql = "SELECT * FROM unlaunched_flyers";
$result = $db->query($sql);

// Вывод данных на страницу
if ($result->num_rows > 0) {
  // Вывод данных каждой работы
  while($row = $result->fetch_assoc()) {

      echo "<div class='block'>
        <a class='text'>Предмет: &nbsp;$row[unf_subject_name]  &nbsp; Тема:&nbsp; $row[unf_topic] </a>
        <a href='letuchke-prepod-opros-del.php'><div class='button-start'>Удалить</div></a>
        <div class='button-start' style='margin: 0'>
          <a href='letuchke-prepod-opros.html'>Начать</a>
        </div>
      </div>";
}}



$db->close();
      ?>
    </div>
  </body>
</html>
