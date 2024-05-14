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
    <link rel="stylesheet" href="Magazin.css">
    <title>Profile</title>
    
</head>
<body>
    <div class="flex-text">
        <h1 class="glav-text"> Аватарки</h1>
        <h1 class="glav-text">Звания</h1>
    </div>
    <div class="container">
        <div class="avatars">
          <button class="avatar-button"></button>
          <button class="avatar-button"></button>
          <button class="avatar-button"></button>
        </div>
        <div class="ranks">
          <button class="rank-button"  data-rank="Студент">Студент</button>
          <button class="rank-button"  data-rank="Абсолютный C">Абсолютный C</button>
          <button class="rank-button"  data-rank="Морковка">Морковка</button>
        </div>
      </div>    
      <script>
            document.querySelectorAll('.rank-button').forEach(button => {
            button.addEventListener('click', function() {
            var chosenRank = this.getAttribute('data-rank'); 
            localStorage.setItem('selectedRank', chosenRank);
             });
            });
      </script>
</body>
</html>
