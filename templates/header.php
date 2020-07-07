<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
  <link rel="shortcut icon" href="./img/WB.svg" type="image/svg">
  <link rel="stylesheet" href="./css/styles.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: left">
          <?php
            if (empty($user))
            {
              if ($_SERVER['REQUEST_URI'] == 'register')
              {
                echo '<a href="login">Вход</a>';
              } elseif ($_SERVER['REQUEST_URI'] == 'login')
              {
                echo '<a href="register">Регистрация</a>';
              }
            } else
            {
              echo 'Вы вошли как: ' . $user->getNickname() . '<br>';
              echo '<a href="logout">Выйти</a>';
            }
          ?>
      </td>
    </tr>
    <tr>
        <td>