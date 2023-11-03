<?php
  require_once 'config/connect.php';
  $goods_id = $_GET['id'];
  $good = mysqli_query($connect, "SELECT * FROM `goods` WHERE `id` = '$goods_id'");
  // здесь уже данные будут храниться не ввиде индексов, а в виде ключей 
  $good = mysqli_fetch_assoc($good);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
  <h2>Обновить товар</h2>
    <form action="vendor/update.php" method="post">
      <!-- input type="hidden" можно использовать для хранения ID товара, который в данный момент заказывается через форму, или другой сопутствующей информации, то есть информация об id будет скрыта от пользователя на данной странице, но в vendor/update.php мы можем работать с id-->
    <input type="hidden" name="id" value="<?= $goods_id ?>">
      <div class="form_goods">
        <label for="title">Название</label>
        <input type="text" name="title" id="title" placeholder="введите название товара" value="<?= $good['title'] ?>">
      </div>
      <div class="form_goods">
        <label for="description">Описание</label>
        <!-- в textarea мы указываем запись php между открывающимся и закрывающимся тегом -->
        <textarea name="description" id="description"
        placeholder="введите описание товара"><?= $good['description'] ?></textarea>
      </div>
      <div class="form_goods">
        <label for="price">Цена</label>
        <input type="number" name="price" id="price" placeholder="введите цену товара" value="<?= $good['price'] ?>">
      </div>
      <button type="submit">Обновить</button>
    </form>
</body>
</html>