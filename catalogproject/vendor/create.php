<?php
require_once '../config/connect.php';
// имена должны совпадать с теми, что указаны в форме
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];

 mysqli_query($connect, "INSERT INTO `goods` (`id`, `title`, `description`, `price`) VALUES (NULL, '$title', '$description', '$price')");
 // header позволяет вернуться на главную страницу (так как мы возвращаемся на главную, то мы можем после location поставить просто /)
 header('location: ../index.php');