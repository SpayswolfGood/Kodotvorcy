<?php
session_start();
// Подключение к базе данных
include("db_connect.php");

// Получение данных из формы
$subject = $_POST['subject'];
$topic = $_POST['topic'];
$task_text=$_POST['task_text'];
$correct_answer = $_POST['correct_answer'];
$answer1 = $_POST['answer1'];
$answer2 = $_POST['answer2'];
$answer3 = $_POST['answer3'];
$answer4 = $_POST['answer4'];




// Вставка данных в базу данных
$sql = "INSERT INTO `tasks` (`task_number`,`task_subject`, `task_topic`, `task_text`,`student_answer`, `correct_answer`, `answer1`, `answer2`, `answer3`, `answer4`) VALUES ('1','$subject', '$topic', '$task_text','student_answer', '$correct_answer', '$answer1', '$answer2', '$answer3', '$answer4')";
//echo "Добавлено: " . $sql . "<br>" . $db->error;
if ($db->query($sql) === TRUE) {
    header('Location: https://online-flyer.ru/letuchke-prepod.php');
} else {
    echo "Ошибка: " . $sql . "<br>" . $db->error;
}

// Вставка данных в другую таблицу
$sql_other = "INSERT INTO unlaunched_flyers (unf_subject_name,unf_stud_group, unf_topic) VALUES ('$subject', '0' ,'$topic')";
if ($db->query($sql_other) === TRUE) {
    echo "Данные также добавлены в другую таблицу";
} else {
    echo "Ошибка: " . $sql_other . "<br>" . $db->error;
}


$db->close();
?>