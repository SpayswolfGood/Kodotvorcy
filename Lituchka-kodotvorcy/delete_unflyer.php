<?php
// Подключение к базе данных
include("db_connect.php");

if (isset($_GET['delete_id'])) {
    $flyer_id = $_GET['delete_id'];

    // Подготовка запроса на удаление
    $query = "DELETE FROM unlaunched_flyers WHERE unf_id = ?";
    if ($stmt = $db->prepare($query)) {
        $stmt->bind_param("i", $unf_id);
        if ($stmt->execute()) {
            header('Location: https://online-flyer.ru/letuchke-prepod.php');
        } else {
            echo "Ошибка при удалении летучки: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Ошибка подготовки запроса: " . $db->error;
    }
    $db->close();
}
?>