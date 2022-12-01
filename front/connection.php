<?php
$servername = "localhost";
$database = "airlines";
$username = "root";
$password = "qwerty123";
// Создаем соединение
$mysqli = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
// mysqli_close($conn);
?>
