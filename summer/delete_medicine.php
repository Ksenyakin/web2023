<?php
// Устанавливаем соединение с базой данных
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение на ошибки
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Получаем ID записи, которую нужно удалить
$id = $_POST['id'];

// Выполняем запрос на удаление записи
$sql = "DELETE FROM medicines WHERE id=$id";

// Проверяем результат выполнения запроса
if ($conn->query($sql) === TRUE) {
  echo "Запись успешно удалена";
} else {
  echo "Ошибка удаления записи: " . $conn->error;
}

// Закрываем соединение с базой данных
$conn->close();
?>
