<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <base href="http://localhost/Blog/">
    <link rel="stylesheet" href="www/styles.css">
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
          <?= !empty($user) ? 'Вы вошли как: ' . $user->getNickname() : '<a href="www/login">Войти</a>'?> <br>
          <?php
            if (!empty($user))
            {
              echo '<form class="logout" action="www/register" method="post">';
              echo '<button value="logout"><a href="www/register">Выйти</a></button>';
              echo '</form>';
            }
          ?>
      </td>
    </tr>
    <tr>
        <td>