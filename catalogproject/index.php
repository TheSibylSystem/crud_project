<?php
// Мы вынесли подключение к БД в отдельный файл (connect.php), теперь мы можем подключать данную страницу к другим с помощью require_once
require_once 'config/connect.php';
// важно, чтобы стояли обратные кавычки
$goods = mysqli_query($connect, "SELECT * FROM `goods`");
// mysqli_fetch_all извлекает все строки из результирующего набора и помещает их в ассоциативный массив или обычный массив
$goods = mysqli_fetch_all($goods);

// с помощью данной записи из 3 строк можно вывести массив как ключ-значение и проверить, загрузились ли туда данные
// echo '<pre>';
// print_r($goods);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Товары</title>
</head>

<body>
  <table>
    <tr>
      <th>id</th>
      <th>Название</th>
      <th>Описание</th>
      <th>Цена, руб.</th>
      <th>&#9672;</th>
      <!-- &#9998 - элемент карандашика -->
      <th>&#9998;</th>
      <th>&#10006;</th>
    </tr>
    <?php
      foreach($goods as $good) {
        ?>
        <tr>
          <td><?= $good[0] ?></td>
          <td><?= $good[1] ?></td>
          <td><?= $good[2] ?></td>
          <td><?= $good[3] ?></td>
          <!-- нам необходимо обозначить, что данная ссылка будет редактировать товар с конкретным id, для этого мы используем get параметры ?id= -->
          
          <td><a href="update.php?id=<?= $good[0] ?>">Обновить</a></td>
          <td><a href="vendor/delete.php?id=<?= $good[0] ?>">Удалить</a></td>
        </tr>
        <?php
      }
    ?>
  </table>

  <h2>Добавить новый товар</h2>
  <form action="vendor/create.php" method="post">
    <div class="form_goods">
      <label for="title">Название</label>
      <input type="text" name="title" id="title" placeholder="введите название товара">
    </div>
    <div class="form_goods">
      <label for="description">Описание</label>
      <textarea name="description" id="description"
      placeholder="введите описание товара" ></textarea>
    </div>
    <div class="form_goods">
      <label for="price">Цена</label>
      <input type="number" name="price" id="price" placeholder="введите цену товара">
    </div>
    <button type="submit">Добавить</button>
  </form>
</body>
</html>
