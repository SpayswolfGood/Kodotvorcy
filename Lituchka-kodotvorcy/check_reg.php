<?php
session_start();

if (isset($_POST['user_login'], $_POST['password'])) {
    $user_login = htmlspecialchars(trim($_POST['user_login']));
    $password = htmlspecialchars(trim($_POST['password']));
    if (empty($user_login) || empty($password)) {
        exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
    include("db_connect.php");

    $stmt = $db->prepare("SELECT * FROM users WHERE user_login = ?");
    $stmt->bind_param("s", $user_login);
    $stmt->execute();
    $result = $stmt->get_result();
    $myrow = $result->fetch_assoc();

    if (empty($myrow['password'])) {
        exit("Извините, введенные вами логин или пароль неверны.");
    } else {
        if ($user_login == 'root' && $password == 'uM6OIzc5KL') {
            $_SESSION['admin'] = true;
            $_SESSION['user_login'] = $myrow['user_login'];
            $_SESSION['id'] = $myrow['id'];
            header('Location: https://online-flyer.ru/adminpanel.php');
        } else {
            if ($password == $myrow['password']) {
                $_SESSION['user_login'] = $myrow['user_login'];
                $_SESSION['id'] = $myrow['id'];
                $_SESSION['std_group'] = $myrow['std_group'];
                
                if ($myrow['role'] == 'Преподаватель') {
                    header('Location: https://online-flyer.ru/index-prepod.php');
                } else {
                    header('Location: https://online-flyer.ru');
                }

            } else {
                exit("Извините, введенный вами логин или пароль неверный.");
            }
        }
    }


    $stmt->close();
    $db->close();
} else {
    exit("Ошибка: Не удалось получить все необходимые данные.");
}
?>

