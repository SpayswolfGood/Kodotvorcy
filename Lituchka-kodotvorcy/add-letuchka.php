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
    <link rel="stylesheet" href="add-letuchka.css">
    <title>Profile</title>
    
</head>
<body>
       <h1 class="glav-text">Создание летучки</h1>
       <form class="input-system" action="add-letuchka-handler.php" method='post'>
        <span class="zagolovok">Предмет: <input type="text" placeholder="Введите предмет летучки" name='subject'></span>
         <span class="zagolovok">Тема: <input type="text" placeholder="Введите тему летучки" name='topic'></span>

         <div id="questions">
          <span class="zagolovok">Вопрос1: <input type="text" placeholder="Введите вопрос" name='task_text'></span><br>
          <span class="zagolovok">1. <input type="text" placeholder="1." name='answer1'></span><br>
          <span class="zagolovok">2. <input type="text" placeholder="2." name='answer2'></span><br>
          <span class="zagolovok">3. <input type="text" placeholder="3." name='answer3'></span><br>
          <span class="zagolovok">4. <input type="text" placeholder="4." name='answer4'></span><br>
          <span class="zagolovok">Ответ: <input type="text" placeholder="Введите ответ на вопрос" name='correct_answer'></span><br>
        </div>
        <div class="bt-con">
          <a id="add" class="Add"><img src="img/Add.svg" style="width:4vw;height:auto;"></a>
          <a id="remove" class="Add"><img src="img/Delete.svg" style="width:4vw;height:auto;"></a>
        </div>

        <a href="#" ><button class="but-st">Создать</button></a>
</form>

       <script>
        document.addEventListener('DOMContentLoaded', function() {
          var questionNumber = 1;
        
          document.getElementById('add').addEventListener('click', function() {
            questionNumber++;
            var newQuestion = '<span class="zagolovok">Вопрос' + questionNumber + ': <input type="text" placeholder="Введите вопрос"></span><br>';
            for (var i = 1; i <= 4; i++) {
              newQuestion += '<span class="zagolovok">' + i + '. <input type="text" placeholder="' + i + '."></span><br>';
            }
            newQuestion += '<span class="zagolovok">Ответ: <input type="text" placeholder="Введите ответ на вопрос"></span><br>';
            document.getElementById('questions').innerHTML += newQuestion;
          });
        
          document.getElementById('remove').addEventListener('click', function() {
            if (questionNumber > 1) {
              var questions = document.getElementById('questions');
              var lastQuestion = questions.lastElementChild;
              for (var i = 0; i < 12; i++) {
                questions.removeChild(questions.lastElementChild);
              }
              questionNumber--;
            }
          });
        });
        </script>
</body>
</html>
