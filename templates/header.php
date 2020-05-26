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
          <!-- TODO: На стр. входа должно быть написано "Зарегистрироваться", на стр. регистрации - "Войти" -->
          <?= !empty($user) ? 'Вы вошли как: ' . $user->getNickname() : '<a href="www/login">Войти</a>'?> <br>
          <?= !empty($user) ? '<a href="www/logout">Выйти</a>' : ''?>
      </td>
    </tr>
    <tr>
        <td>