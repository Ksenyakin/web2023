<?php
// Устанавливаем соединение с базой данных
$user = 'u52852';
$pass = '3064314';
$db = new PDO('mysql:host=localhost;dbname=u52852', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
// $dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение на ошибки
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Получаем поисковый запрос из POST-параметров формы
$search_query = $_POST['search_query'];

// Выполняем запрос на поиск записей
$sql = "SELECT * FROM medicines WHERE name LIKE '%$search_query%' OR employee LIKE '%$search_query%' OR buyer LIKE '%$search_query%'";

$result = $conn->query($sql);

// Проверяем наличие результатов
if ($result->num_rows > 0) {
  // Выводим результаты
  while($row = $result->fetch_assoc()) {
    echo "ID: " . $row["id"]. " - Название: " . $row["name"]. " - Стоимость: " . $row["price"]. " - Дата: " . $row["date"]. "<br>";
  }
} else {
  echo "Результатов не найдено";
}

// Закрываем соединение с базой данных
$conn->close();
?>
