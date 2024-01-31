<?php
header('Content-Type: application/json');

// Получение данных из POST-запроса
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$apartment = isset($_POST['apartment']) ? $_POST['apartment'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Ваша логика проверки данных на сервере
// В данном примере просто выводим данные на экран
$result = array('success' => true, 'message' => 'Данные успешно записаны', 'data' => $_POST);

echo json_encode($result);
?>
