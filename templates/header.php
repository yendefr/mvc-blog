<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
  <link rel="shortcut icon" href="../www/img/WB.svg" type="image/svg">
  <link rel="stylesheet" href="../www/css/styles.css">
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
              if ($_SERVER['REQUEST_URI'] == '/Blog/www/register')
              {
                echo '<a href="www/login">Вход</a>';
              } elseif ($_SERVER['REQUEST_URI'] == '/Blog/www/login')
              {
                echo '<a href="www/register">Регистрация</a>';
              }
            } else
            {
              echo 'Вы вошли как: ' . $user->getNickname() . '<br>';
              echo '<a href="www/logout">Выйти</a>';
            }
          ?>
      </td>
    </tr>
    <tr>
        <td>