<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Подключение к базе данных
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shop';

$mysqli = new mysqli($host, $username, $password, $dbname);


// Получаем данные из формы
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$patronymic = $_POST['patronymic'] ?? null;
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$product = $_POST['product'];
$comment = $_POST['comment'] ?? null;

// Подготавливаем SQL-запрос
$sql = "INSERT INTO orders (lastname, firstname, patronymic, address, phone, email, product, comment) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);


$stmt->bind_param(
    "ssssssss",
    $lastname, $firstname, $patronymic, $address, $phone, $email, $product, $comment
);

if ($stmt->execute()) {
    echo "Order submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
