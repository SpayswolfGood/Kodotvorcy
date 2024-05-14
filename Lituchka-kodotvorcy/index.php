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
    <link rel="stylesheet" href="index.css">
    <title>Profile</title>

</head>
<body>
    <div class="loyaut">
        <header>
            <div class="Up-menu">
                <a href="https://www.sstu.ru/" class="Up-menu-left-button"> <img src="img\sstu.svg" alt="" class="Up-menu-left-button-img"> </a>
                <div class="Up-menu-center-button-L"><a href="Profil-student.php" target="window1">Профиль</a></div>
                <div class="Up-menu-center-button"><a href="letuchke.php" target="window1">Летучки</a></div>
                <div class="Up-menu-center-button"><a href="Result.php" target="window1">Результаты</a></div>
                <div class="Up-menu-center-button-R" ><a href="Reyting.php" target="window1">Рейтинг</div>
                <div class="Up-menu-right-button"><a href="logout.php" id="buttton-to-blue" style ="color:#326de0;">Выход</a></div>
            </div>
        </header>

        
        <main>
            <iframe src="Profil-student.php" width="100%" height="100%" style="border:none;" name="window1" bgcolor="#e9faff">
        
            </iframe>
        </main>

        <footer>
            <div class="down">
               <img src="img\down-circle.svg" alt="" style="width:100%; height:100%;">
                <div class="down2"></div>
            </div>
        </footer>
    </div>
   

</body>
</html>