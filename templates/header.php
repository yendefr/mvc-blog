<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Web Blog</title>
  <link rel="shortcut icon" href="https://yendefr-blog.herokuapp.com/img/WB.svg" type="image/svg">
  <link rel="stylesheet" href="https://yendefr-blog.herokuapp.com/css/reset.css">
  <link rel="stylesheet" href="https://yendefr-blog.herokuapp.com/css/styles.css">
</head>
<body>
<header class="header">
  <div class="wrapper">

    <div class="header__wrapper">
      <div class="header__logo">
        <a href="/" class="header__logo-link">
          Web Blog
        </a>
      </div>

      <div class="header_nav">
        <ul class="header__list">
          <li class="header__item">
            <a href="add" class="header__link">Написать статью</a>
          </li>
          <li class="header__item">
            <?php if (isset($user)): ?>
              <a href="/logout" class="header__link"><?= $user->getNickname() ?></a>
            <?php else:?>
              <a href="login" class="header__link">Войти</a>
            <?php endif;?>
          </li>
        </ul>
      </div>
    </div>

  </div>
</header>