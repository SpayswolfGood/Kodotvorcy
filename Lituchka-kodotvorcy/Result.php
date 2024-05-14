<?php
session_start();
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
    <link rel="stylesheet" href="Result.css" />
    <title>Profile</title>
  </head>
  <body>
    <h1 class="glav-text">Результаты</h1>
    <div class="Scrol-Block">
    <?php
// Подключение к базе данных
include("db_connect.php");

$current_student_id = $_SESSION['id'];
// Запрос к базе данных для получения данных по сданным работам текущего студента
$sql = "SELECT * FROM stud_results WHERE student_id = $current_student_id";
$result = $db->query($sql);

// Отображение результатов на странице
if ($result->num_rows > 0) {
    // вывод данных о результатах работ
    while($row = $result->fetch_assoc()) {
        echo "<div class='block'>
        <a class='text'>$row[r_subject]</a>
        <a class='text2'>Дата: $row[r_date] / Набрано баллов: $row[collected_points]</a>
      </div>";
    }

  }
  else {
    echo "Нет результатов для текущего студента";
}
$db->close();

      ?>
    </div>
  </body>
</html>
