<?php
// Подключаемся к базе данных
$user = 'u52852';
$pass = '3064314';
$db = new PDO('mysql:host=localhost;dbname=u52852', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Обрабатываем отправку формы
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["edit_medicine"])) {
  // Получаем данные из формы
  $id = $_POST["id"];
  $name = $_POST["name"];
  $price = $_POST["price"];
  $quantity = $_POST["quantity"];

  // Подготавливаем SQL запрос
  $sql = "UPDATE medicines SET name='$name', price=$price, quantity=$quantity WHERE id=$id";

  // Выполняем запрос и проверяем его на ошибки
  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Закрываем соединение с базой данных
$conn->close();
?>
