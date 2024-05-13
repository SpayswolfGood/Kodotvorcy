<?
session_start();	// инициализируем механизм сессий
session_destroy();	// удаляем текущую сессию
Header("Location: login.php");	// перенаправляем на protected.php
//<a href="адрес_скрипта_php">Выйти</a>
?>

