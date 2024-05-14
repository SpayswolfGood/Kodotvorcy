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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="Result-prepod-group.css">
    <title>Profile</title>
    
</head>
<body>
    <h1 class="glav-text">Результаты название группы</h1>
    <div class="Scrol-Block">
        <div class="block">
            <a class="text">Имя Фамилия ученика</a>
            <a class="text2">Балл/Место в Рейтинге</a>
        </div>
    </div>
</body>
</html>
