<?php
$connect = mysqli_connect('localhost', 'root', '', 'clothes');

// Если не получилось установить связь с БД, то будет выдана ошибка с помощью die (выводит сообщение и прекращает работу текущего скрипта)
if (!$connect) {
  die('Ошибка подключения к БД');
}