<?php
$servername = "localhost";
$database = "airlines";
$username = "admin";
$password = "admin";
// Создаем соединение
$mysql = mysqli_connect($servername, $username, $password, $database);
$mysql_passid = mysqli_connect($servername, $username, $password, $database);
$mysql_ticketid = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
// mysqli_close($conn);
?>
