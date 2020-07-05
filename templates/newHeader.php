<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Web Blog</title>
  <base href="/Blog/">
  <link rel="shortcut icon" href="www/img/WB.svg" type="image/svg">
  <link rel="stylesheet" href="www/css/reset.css">
  <link rel="stylesheet" href="www/css/newStyles.css">
</head>
<body>
<header class="header">
  <div class="wrapper">

    <div class="header__wrapper">
      <div class="header__logo">
        <a href="www/" class="header__logo-link">
          Web Blog
        </a>
      </div>

      <div class="header_nav">
        <ul class="header__list">
          <li class="header__item">
            <a href="www/add" class="header__link">Написать статью</a>
          </li>
          <li class="header__item">
            <a href="" class="header__link"><?= $user->getNickname() ?></a>
          </li>
        </ul>
      </div>
    </div>

  </div>
</header>